<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HystoriPengirimans;
use App\Rute;
use App\Jadwalpengiriman;
use App\Notakirim;
use App\Manifest;
use App\DetailHistory;
use DB;

class HystoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HystoriPengirimans::all();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";

            $data1 = [];
            foreach ($data as $key => $value) {
                $tgl = date('Y-m-d', strtotime((String)$value->created_at));
                $time = date("h:i:s", strtotime((String)$value->created_at));
                $time1 = date('h:i:s', strtotime($time . "+1 hour"));
                $tgl1 = date('Y-m-d', strtotime($tgl . "+1 day"));
                $value->waktu = $tgl1." ".$time1;
                $data1[$key]    = $value;
            }
            
            $res['data'] = $data1;
            $res["filter"] = array('0' => "Dikirim",
                "1" => "Sampai Kantor Bali",
                "2" => "Dibawa Kurir",
                "3"=> "Menuju Alamat Penerima",
                "4" => "Barang Diterima" );

            return response($res);
        }
        else{
            $res['message'] = "error";

            return response($res);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {    
        $jadwal = $this->getIdJadwal($request->id_user);

        if ($jadwal > 0) {
         try {
            $histori                        = new HystoriPengirimans();
            $histori->tanggal               = date("Y-m-d");
            $histori->lokasi_awal           = $request->awal;
            $histori->lokasi_akhir          = $request->akhir;
            $histori->jarak                 = $this->getJarak($request->awal, $request->akhir);
            $histori->jadwalpengiriman_id   = $this->getIdJadwal($request->id_user);
            $histori->save();

        } catch (Exception $e) {
         $data = [
            'error' => 'Gagal Simpan Rute Pengiriman',
            'data'  => []
        ];

        return response($data);
    }
    $data = [
        'success'   => 'Rute Pengiriman Berhasil Disimpan',
        'data'      => $histori
    ];

    return response($data);
}else{
    $data = [
        'error' => 'Jadwal Kurir Belum ada, silahkan buat jadwal dulu ',
        'data'  => []
    ];

    return response($data);
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }


    public function kirim($id)
    {
        $histori = HystoriPengirimans::where("id", $id)->first();
        //dd($histori->status);
        try {
            DB::beginTransaction();

            $update = array('status' => "1");
            HystoriPengirimans::where("id", $id)->update($update);

            $data = DetailHistory::select("manifest_id")->where("historypengiriman_id", $id)->get();
            $manifests = Manifest::select("id", "no_manifest")->get();
            $notakirims = Notakirim::select("id", "no_resi", "manifest_id", "status")->get();

            // update status di nota kirims
            $a_data= [];
            foreach ($data as $key => $value) {
                foreach ($manifests as $key1 => $value1) {
                    if ($value->manifest_id==$value1->id) {
                        $a_data[$value1->id] = $value1;
                    }
                }
            }

            // do update
            foreach ($a_data as $key => $value) {
                $status = array('status' => "2");
                Notakirim::where("manifest_id", $value->id)->update($status);
            }

            DB::commit();
            
        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Gagal Ditambahkan',
                'data'    => []
            ];

            return response($data);
        }

        $data = [
            'success'   => 'Manifests Sukses Ditambahkan',
            'data'    => $histori
        ];

        return response($data);
    }

    public function sampai($id)
    {
        $histori = HystoriPengirimans::where("id", $id)->first();
        //dd($histori->status);
        try {
            DB::beginTransaction();

            $update = array('status' => "2");
            HystoriPengirimans::where("id", $id)->update($update);

            $data = DetailHistory::select("manifest_id")->where("historypengiriman_id", $id)->get();
            $manifests = Manifest::select("id", "no_manifest")->get();
            $notakirims = Notakirim::select("id", "no_resi", "manifest_id", "status")->get();

            // update status di nota kirims
            $a_data= [];
            foreach ($data as $key => $value) {
                foreach ($manifests as $key1 => $value1) {
                    if ($value->manifest_id==$value1->id) {
                        $a_data[$value1->id] = $value1;
                    }
                }
            }

            // do update
            foreach ($a_data as $key => $value) {
                $status = array('status' => "3");
                Notakirim::where("manifest_id", $value->id)->update($status);
            }

            DB::commit();

        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Sukses Ditambahkan',
                'data'    => []
            ];

            return response($data);
        }

        $data = [
            'success'   => 'Manifests Sukses Ditambahkan',
            'data'    => $histori
        ];

        return response($data);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getJarak($awal, $akhir)
    {   
        dd($akhir);
        // set koordinat titik awal
        $awal       = Rute::where("kecamatan_id", $awal)->get()->first();
        //die($dataawal);
        $data1[0]   = $awal->koordinat_y;
        $data1[1]   = $awal->koordinat_x;

        // set koordinat titik akhir
        $akhir      = Rute::where("kecamatan_id", $akhir)->get()->first();
        $data[0]    = $akhir->koordinat_y;
        $data[1]    = $akhir->koordinat_x;

        dd($awal);
        $jarak      = $this->HitungJarak($data1, $data);
        dd($jarak);
        return $jarak;
    }

    // fungsi radius 
    public function rad($x){ 
        return $x * M_PI / 180; 
    }

    // fungsi untuk menghitung jarak
    public function HitungJarak($coord_a, $coord_b){
        //die(print_r($coord_b));
        # jarak kilometer dimensi (mean radius) bumi
        $R = 6371;
        $dLat = $this->rad(($coord_b[0]) - ($coord_a[0]));
        $dLong = $this->rad($coord_b[1] - $coord_a[1]);
        $a = sin($dLat/2) * sin($dLat/2) + cos($this->rad($coord_a[0])) * cos($this->rad($coord_b[0])) * sin($dLong/2) * sin($dLong/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $d = $R * $c;

        return number_format($d, 0, '.', ',');
    }


    public function getIdJadwal($iduser)
    {
        $data = array('1' => 'Sun',
         '2' => 'Tue',
         '3' => 'Wed',
         '4' => 'Thu',
         '5' => 'Fri',
         '6' => 'Sat');
        $hari = date('D');

        $datahari = 0;
        foreach ($data as $key => $value) {
            if ($hari==$value) {
                $datahari = $key;
            }
        }

        $jadwal = Jadwalpengiriman::where("hari", $datahari)->where("karyawan_id_kurir", $iduser)->get()->toArray();
        
        $ret = 0;
        if (count($jadwal)>0) {
            $ret = $jadwal[0]["id"];
        }

        return $ret;
    }
}
