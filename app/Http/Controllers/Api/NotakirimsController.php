<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notakirim;
use App\HistoryKurir;
use DB;
use App\Notiftracking;

class NotakirimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id =null)
    {   
        $data = Notakirim::select("id", "no_resi", "namapenerima", "alamatpenerima", "tlppenerima", "status", "tanggal")
        ->where("status", ">=", "3")->get();

        if (isset($id)) {
            $data = [];
            $data = Notakirim::select("id", "no_resi", "namapenerima", "alamatpenerima", "tlppenerima", "status", "tanggal")
            ->where("status", $id)->get();
        }

        //dd($data);
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";
            $a_data = [];
            foreach ($data as $key => $value) {
                $a_data[$key]["id"] = $value->id;
                $a_data[$key]["no_resi"] = $value->no_resi;
                $a_data[$key]["namapenerima"] = $value->namapenerima;
                $a_data[$key]["alamatpenerima"] = $value->alamatpenerima;
                $a_data[$key]["tlppenerima"] = $value->tlppenerima;
                $a_data[$key]["status"] = $value->status;
                $a_data[$key]["tanggal"] = date("d-m-Y", strtotime($value->tanggal));
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

            $update = array("status" => "4");
            Notakirim::where("id", $id)->update($update);

            $histori = new HistoryKurir();
            $histori->id_kurir  = $id_user;
            $histori->id_nota   = $id;
            $histori->tanggal   = date("Y-m-d");
            $histori->save();

            $tracking               = new Notiftracking();
            $tracking->id_nota      = $id;
            $tracking->status       = 4;
            $tracking->save();

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

            $tracking               = new Notiftracking();
            $tracking->id_nota      = $id;
            $tracking->status       = 5;
            $tracking->save();

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
            
            $tracking               = new Notiftracking();
            $tracking->id_nota      = $id;
            $tracking->status       = 6;
            $tracking->save();

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

    public function konfirmasi($id)
    {   
        $histori = [];
        try {
            
            DB::beginTransaction();

            $update = array("status" => "7");
            Notakirim::where("id", $id)->update($update);
            
            $tracking               = new Notiftracking();
            $tracking->id_nota      = $id;
            $tracking->status       = 7;
            $tracking->save();

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
