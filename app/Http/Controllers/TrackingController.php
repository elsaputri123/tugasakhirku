<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracking;

class TrackingController extends Controller
{
    public function setPosition(Request $Request)
    {
    	$tracking 	= new Tracking();
    	$tracking->id_kurir = $Request->id_kurir;
    	$tracking->id_nota = $Request->id_nota;
    	$tracking->y_awal = $Request->y_awal;
    	$tracking->x_awal = $Request->x_awal;
    	$tracking->y_akhir = $Request->y_akhir;
    	$tracking->x_akhir = $Request->x_akhir;
    	$tracking->save();

    	$res['message'] = "success";
        $res['data'] = $tracking;
        
        return response($res);
    }
    
    public function updatePosition(Request $Request)
    {   
        $data = [];
        $data["y_awal"] => $Request->y_awal;
        $data["x_awal"] => $Request->x_awal;
        Tracking::where("id_nota", $Request->id_nota)->update($data);
        
    	$data 	= Tracking::where("id_nota", $Request->id_nota)->get()->first();
    	if(!is_null($data)){
            $res['message'] = "success";
            $res['data'] = $data;
            
            return response($res);
        }
        else{
            $res['message'] = "error";
            
            return response($res);
        }
    }
    
    public function getPosition($id)
    {
    	$data  = Tracking::where("id_nota", $Request->id_nota)->get()->first();
    	if(!is_null($data)){
            $res['message'] = "success";
            $res['data'] = $data;

            return response($res);
        }
        else{
            $res['message'] = "error";
            
            return response($res);
        }
    }
}
