<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notiftracking;
use App\Notakirim;
use DB;
use App\Rute;

class NotifTrackingController extends Controller
{
	public function getTracking($id)
	{	
		$nota = Notakirim::where("no_resi", $id)->get()->first();
		$data = Notiftracking::where("id_nota", $nota->id)->get();
        
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        	$res['message'] = "success";

        	$a_data = [];
        	foreach ($data as $key => $value) {
        		$a_data[$key]["id"] = $value->id;
        		$a_data[$key]["status"] = $value->status;
        		$a_data[$key]["created_at"] = date("d-m-Y H:i:s", strtotime($value->created_at));
        	}

            $tgl = date('Y-m-d', strtotime((String)$nota->created_at));
            $time = date("h:i:s", strtotime((String)$nota->created_at));
            $time1 = date('h:i:s', strtotime($time . "+1 hour"));
            $tgl1 = date('Y-m-d', strtotime($tgl . "+1 day"));
            $nota->waktu = $tgl1." ".$time1;
            
            $res['data'] = $a_data;
            $res['detail'] = $nota;

            return response($res);
        }
        else{
        	$res['message'] = "error";

        	return response($res);
        }
    }

    public function getMaps($id)
    {	
        $sql = "SELECT n.no_resi,n.id,n.namapenerima,n.alamatpenerima, p.lokasi_awal, p.lokasi_akhir
        FROM notakirims n left join manifests m on n.manifest_id=m.id 
        left join detailhistorys d on d.manifest_id=m.id 
        left join historypengirimans p on d.historypengiriman_id=p.id 
        where n.no_resi='".$id."'";

        $data = DB::select($sql);
        //dd($data);
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        	$res['message'] = "success";

        	$lokasi_awal = Rute::where("kecamatan_id", $data[0]->lokasi_awal)->get()->first();
        	$lokasi_akhir = Rute::where("kecamatan_id", $data[0]->lokasi_akhir)->get()->first();

        	$a_data = [];
            $a_data["id_nota"] = $lokasi_akhir->id;
            $a_data["posisi"] = $lokasi_akhir->nama;
            $a_data["y_awal"] = $lokasi_awal->koordinat_y;
            $a_data["x_awal"] = $lokasi_awal->koordinat_x;

        	// lok
            $a_data["y_akhir"] = $lokasi_akhir->koordinat_y;
            $a_data["x_akhir"] = $lokasi_akhir->koordinat_x;

            $res['data'] = $a_data;

            return response($res);
        }
        else{
        	$res['message'] = "error";

        	return response($res);
        }
    }

    public function getMapsDriver($id)
    {   
        $sql = "SELECT n.no_resi,n.id,n.namapenerima,n.alamatpenerima, p.lokasi_awal, p.lokasi_akhir
        FROM notakirims n left join manifests m on n.manifest_id=m.id 
        left join detailhistorys d on d.manifest_id=m.id 
        left join historypengirimans p on d.historypengiriman_id=p.id 
        where n.id='".$id."'";

        $data = DB::select($sql);
        //dd($data);
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";

            $lokasi_awal = Rute::where("kecamatan_id", $data[0]->lokasi_awal)->get()->first();
            $lokasi_akhir = Rute::where("kecamatan_id", $data[0]->lokasi_akhir)->get()->first();
            
            $a_data = [];
            $a_data["id_nota"] = $lokasi_akhir->id;
            $a_data["posisi"] = $lokasi_akhir->nama;
            $a_data["y_awal"] = $lokasi_awal->koordinat_y;
            $a_data["x_awal"] = $lokasi_awal->koordinat_x;
            
            // lok
            $a_data["y_akhir"] = $lokasi_akhir->koordinat_y;
            $a_data["x_akhir"] = $lokasi_akhir->koordinat_x;

            $res['data'] = $a_data;

            return response($res);
        }
        else{
            $res['message'] = "error";

            return response($res);
        }
    }
}
