<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notakirim;
use App\HistoryKurir;
use DB;
use App\Notiftracking;
use App\Kecamatan;

class NotakirimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id =null)
    {   
        $data = Notakirim::select("id", "no_resi", "namapenerima", "alamatpenerima", "tlppenerima", "status", "tanggal", "kecamatan_id")
        ->where("status", ">=", "3")->orderBy("jarak", "desc")->get();
        
        if (isset($id)) {
            $data = [];
            $data = Notakirim::select("id", "no_resi", "namapenerima", "alamatpenerima", "tlppenerima", "status", "tanggal", "kecamatan_id")
            ->where("status", $id)->orderBy("jarak", "desc")->get();
        }
        
        $kecamatan = Kecamatan::select("id", "nama")->get();

        $a_kecamatan =[];
        foreach ($kecamatan as $key => $value) {
            $a_kecamatan[$value->id] = $value;
        }

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";
            $a_data = [];
            foreach ($data as $key => $value) {
                $kec = "";
                if (isset($a_kecamatan[$value->kecamatan_id])) {
                    $kec = $a_kecamatan[$value->kecamatan_id]->nama;
                }

                $a_data[$key]["no"] = $key+1;
                $a_data[$key]["id"] = $value->id;
                $a_data[$key]["no_resi"] = $value->no_resi;
                $a_data[$key]["namapenerima"] = $value->namapenerima;
                $a_data[$key]["alamatpenerima"] = "Kec. ".$kec.", ".$value->alamatpenerima;
                $a_data[$key]["tlppenerima"] = $value->tlppenerima;
                $a_data[$key]["status"] = $value->status;
                $a_data[$key]["tanggal"] = date("d-m-Y", strtotime($value->tanggal));
                $tgl = date('Y-m-d', strtotime((String)$value->created_at));
                $time = date("h:i:s", strtotime((String)$value->created_at));
                $time1 = date('h:i:s', strtotime($time . "+1 hour"));
                $tgl1 = date('Y-m-d', strtotime($tgl . "+1 day"));
                $a_data[$key]["waktu"] = $tgl1." ".$time1;
            }

            $res['data'] = $a_data;
            
            return response($res);
        }
        else{
            $res['message'] = "error";

            return response($res);
        }
    }

    public function bawa($id, $id_user)
    {   
        try {
            DB::beginTransaction();

            $update = array("status" => "4", "tgltiba" => date("Y-m-d"));
            Notakirim::where("id", $id)->update($update);

            $histori = new HistoryKurir();
            $histori->id_kurir  = $id_user;
            $histori->id_nota   = $id;
            $histori->tanggal   = date("Y-m-d");
            $histori->save();

            $count = Notiftracking::where("id_nota", $id)->where("status", 4)->count();
            if($count==0){
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $id;
                $tracking->status       = 4;
                $tracking->save();
            }

            DB::commit();
        } catch (Exception $e) {
            $data = [
                'error'   => 'Barang Gagal Dikirim',
                'data'    => []
            ];
            
            return response($data);
        }

        $data = [
            'success'   => 'Barang Sukses Dikirim',
            'data'    => $histori
        ];

        return response($data);
    }

    public function kirim($id)
    {   
        $histori = [];
        try {
            DB::beginTransaction();

            $update = array("status" => "5");
            Notakirim::where("id", $id)->update($update);

            $count = Notiftracking::where("id_nota", $id)->where("status", 5)->count();
            if($count==0){
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $id;
                $tracking->status       = 5;
                $tracking->save();
            }
            $histori = Notakirim::where("id", $id)->get();

            DB::commit();
        } catch (Exception $e) {
            $data = [
                'error'   => 'Barang Gagal Dikirim Ke Peneriman',
                'data'    => []
            ];

            return response($data);
        }

        $data = [
            'success'   => 'Barang Sukses Dikirim Ke Peneriman',
            'data'    => $histori
        ];

        return response($data);
    }
    
    public function sampai($id)
    {   
        $histori = [];
        try {
            DB::beginTransaction();

            $update = array("status" => "6");
            Notakirim::where("id", $id)->update($update);
            
            $count = Notiftracking::where("id_nota", $id)->where("status", 6)->count();
            if($count==0){
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $id;
                $tracking->status       = 6;
                $tracking->save();
            }

            $histori = Notakirim::where("id", $id)->get();

            DB::commit();
        } catch (Exception $e) {
            $data = [
                'error'   => 'Barang Gagal Sampai Ke Peneriman',
                'data'    => []
            ];

            return response($data);
        }

        $data = [
            'success'   => 'Barang Success Sampai Ke Peneriman',
            'data'    => $histori
        ];

        return response($data);
    }
    
    public function konfirmasi($id, $nama)
    {   
        $histori = [];
        try {
            
            DB::beginTransaction();

            $update = array("status" => "7", "nmpenerimabarang"=> $nama, "tgltiba" => date("Y-m-d"));
            Notakirim::where("id", $id)->update($update);
            
            $count = Notiftracking::where("id_nota", $id)->where("status", 7)->count();
            if($count==0){
                $tracking               = new Notiftracking();
                $tracking->id_nota      = $id;
                $tracking->status       = 7;
                $tracking->save();
            }

            $histori = Notakirim::where("id", $id)->get();

            DB::commit();
        } catch (Exception $e) {
            $data = [
                'error'   => 'Barang Gagal Konfirmasi Ke Peneriman',
                'data'    => []
            ];

            return response($data);
        }

        $data = [
            'success'   => 'Barang Success Konfirmasi Ke Peneriman',
            'data'    => $histori
        ];

        return response($data);
    }
}
