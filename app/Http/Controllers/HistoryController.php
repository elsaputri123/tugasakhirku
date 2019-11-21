<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HystoriPengirimans;
use App\Users;
use App\Karyawan;
use App\Rute;
use App\Kecamatan;
use App\Jadwalpengiriman;
use App\DetailHistory;
use DB;
use App\Manifest;
use App\Notakirim;
use App\Notiftracking;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $logic = HystoriPengirimans::select("historypengirimans.id", "historypengirimans.tanggal", 
            "historypengirimans.lokasi_awal", "historypengirimans.lokasi_akhir", "historypengirimans.jarak", 
            "k.nama as karyawan", 
            "s.nama as kendaraan", "s.no_polisi","j.hari", "historypengirimans.status", 
            "historypengirimans.created_at", DB::raw("historypengirimans.jarak/20*60 as waktu"))
        ->join("jadwalpengirimans as j","historypengirimans.jadwalpengiriman_id", "j.id")
        ->join("karyawans as k", "k.id", "j.karyawan_id_kurir")
        ->join("kendaraans as s", "s.id", "j.kendaraan_id")
        ->orderBy("historypengirimans.tanggal", "desc")->get();

        $data1 = [];
        foreach ($logic as $key => $value) {
            $tgl = date('Y-m-d', strtotime((String)$value->created_at));
            $time = date("h:i:s", strtotime((String)$value->created_at));
            $time1 = date('h:i:s', strtotime($time . "+1 hour"));
            $tgl1 = date('Y-m-d', strtotime($tgl . "+1 day"));
            $value->waktu = $tgl1." ".$time1;
            $data1[$key]    = $value;
        }
        
        $data["data"] = $data1;
        $kecamatan = Kecamatan::select("id", "nama")->get();
        $data1 =[];
        foreach ($kecamatan as $key => $value) {
            $data1[$value->id] = $value->nama;
        }
        $data["kecamatan"] = $data1;

        return view('history.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $domy = Karyawan::with(["jabatans" => function($q)
        {
            $q->where('jabatans.nama', '=', 'sopir');
        }])->get();

        $data['karyawan']  = $domy->where('jabatans', '!=', null);
        $data["kecamatan"]      = Kecamatan::all();
        // dd($data);
        return view('history.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal         = $this->getIdJadwal($request->user_id);
        $jarak          = $this->getJarak($request->awal, $request->akhir);

        if ($jadwal > 0 and $jarak > 0) {
            try {
                $histori                        = new HystoriPengirimans();
                $histori->tanggal               = date("Y-m-d");
                $histori->lokasi_awal           = $request->awal;
                $histori->lokasi_akhir          = $request->akhir;
                $histori->jarak                 = $this->getJarak($request->awal, $request->akhir);
                $histori->jadwalpengiriman_id   = $this->getIdJadwal($request->user_id);
                $histori->save();

            } catch (Exception $e) {
               $data = [
                'error' => 'Gagal Simpan History Pengiriman',
                'data'  => []
            ];

            return redirect()->back()->with($data);
        }
        $data = [
            'success'   => 'Rute History Berhasil Disimpan',
            'data'      => $histori
        ];

        return redirect("history/".$histori->id)->with($data);
    }else{

        $data = [
            'error' => 'Jadwal atau Rute Kurir Belum ada, silahkan buat jadwal dulu ',
            'data'  => []
        ];

        return redirect()->back()->with($data);
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
        $data["data"] = DetailHistory::with(["manifest" => function($q)
        {
            $q->with("notakirims")->get();
        }])->where("historypengiriman_id", $id)->get();
        $data["idhistory"] = $id;

        return view('history.detail', $data);
    }

    public function autocomplete(Request $request)
    {
        $term = $request->term;
        
        $query = "select id, no_manifest from manifests where no_manifest like '%".$term."%' 
        and id not in(select manifest_id from detailhistorys)";
        
        $data = DB::select($query);
        $results = []; 
        foreach ($data as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->no_manifest]; 
        }

        return response()->json($results);
    }

    public function detail(Request $request)
    {   
        $cek = DetailHistory::where("historypengiriman_id", $request->historypengiriman_id)->count();

        if ($cek > 0) {
            $data = [
                'error'   => 'Manifests Sudah Ada'
            ];

            return redirect()->back()->with($data);
        }

        $detail = new DetailHistory();
        $detail->manifest_id = $request->manifest_id;
        $detail->historypengiriman_id = $request->historypengiriman_id;
        try {
            DB::beginTransaction();

            $detail->save();

            $notakirims = Notakirim::select("id", "no_resi", "manifest_id", "status")
                            ->where("manifest_id", $request->manifest_id)->get();

            foreach ($notakirims as $key => $value) {
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $value->id;
                $tracking->status       = 1;
                $tracking->save();
            }

            DB::commit();
        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Gagal Ditambahkan'
            ];

            return redirect()->back()->with($data);
        }

        $data = [
            'success'   => 'Manifests Sukses Ditambahkan'
        ];

        return redirect()->back()->with($data);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

            // insert into tracking 
            $detail = DetailHistory::select("manifest_id")->where("historypengiriman_id", $id)->get()->first();
            $track = Notakirim::select("id", "no_resi", "manifest_id", "status")->where("manifest_id", $detail->manifest_id)->get();
            // insert into detail history
            foreach ($track as $key => $value) {
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $value->id;
                $tracking->status       = 2;
                $tracking->save();
            }
            
            DB::commit();

        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Sukses Ditambahkan'
            ];

            return redirect()->back()->with($data);
        }

        $data = [
                'success' => 'Sukses Simpan Update Pengiriman'
            ];

        return redirect()->back()->with($data);
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

            // insert into tracking 
            $detail = DetailHistory::select("manifest_id")->where("historypengiriman_id", $id)->get()->first();
            $track = Notakirim::select("id", "no_resi", "manifest_id", "status")->where("manifest_id", $detail->manifest_id)->get();
            
            // insert into detail history
            foreach ($track as $key => $value) {
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $value->id;
                $tracking->status       = 3;
                $tracking->save();
            }

            DB::commit();

        } catch (Exception $e) {
            $data = [
                'error'   => 'Manifests Sukses Ditambahkan'
            ];

            return redirect()->back()->with($data);
        }

        $data = [
                'success' => 'Sukses Simpan Update Pengiriman'
            ];

        return redirect()->back()->with($data);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function destroydetail($id)
    {
        DetailHistory::where("id", $id)->delete();

        $data = [
            'success'   => 'Hapus Manifests Sukses'
        ];

        return redirect()->back()->with($data);
    }

    public function getJarak($awal, $akhir)
    {   
        // set koordinat titik awal
        $awal       = Rute::where("kecamatan_id", $awal)->get()->first();
        $akhir      = Rute::where("kecamatan_id", $akhir)->get()->first();
        
        if ($awal != null or $akhir != null) {
            $data1[0]   = $awal->koordinat_y;
            $data1[1]   = $awal->koordinat_x;

             // set koordinat titik akhir
            $data[0]    = $akhir->koordinat_y;
            $data[1]    = $akhir->koordinat_x;

            $jarak      = $this->HitungJarak($data1, $data);
            return $jarak;
        }else{

            return 0;
        }
    }

    // fungsi radius 
    public function rad($x){ 
        return $x * M_PI / 180; 
    }

    // fungsi untuk menghitung jarak
    public function HitungJarak($coord_a, $coord_b){
        
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
        $data = array('1' => 'Mon',
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
        //dd($hari);
        $ret = 0;
        if (count($jadwal)>0) {
            $ret = $jadwal[0]["id"];
        }

        return $ret;
    }
}
