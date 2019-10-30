<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notiftracking;
use App\Notakirim;

class NotifTrackingController extends Controller
{
    public function getTracking($id)
    {	
    	$nota = Notakirim::where("no_resi", $id)->get()->first();
    	$data = Notiftracking::where("id_nota", $nota->id)->get();
    	//dd($nota);
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";

            $a_data = [];
            foreach ($data as $key => $value) {
            	$a_data[$key]["id"] = $value->id;
            	$a_data[$key]["status"] = $value->status;
            	$a_data[$key]["created_at"] = date("d/m/Y H:i:s", strtotime($value->created_at));
            }

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
    	$nota = Notakirim::where("no_resi", $id)->get()->first();
    	$data = Notiftracking::where("id_nota", $nota->id)->get();
    	
    	//dd($nota);
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";

            $a_data = [];
            foreach ($data as $key => $value) {
            	$a_data[$key]["id"] = $value->id;
            	$a_data[$key]["status"] = $value->status;
            	$a_data[$key]["created_at"] = date("d/m/Y H:i:s", strtotime($value->created_at));
            }

            $res['data'] = $a_data;
            $res['detail'] = $nota;

            return response($res);
        }
        else{
            $res['message'] = "error";

            return response($res);
        }
    }
}
