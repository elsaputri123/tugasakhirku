<?php

namespace App\Http\Controllers;

use Illuminate\Http\request;
use App\Tracking;

class TrackingController extends Controller
{
    public function setposition(request $request)
    {
    	$tracking 	= new Tracking();
    	$tracking->id_kurir = $request->id_kurir;
    	$tracking->id_nota = $request->id_nota;
    	$tracking->y_awal = $request->y_awal;
    	$tracking->x_awal = $request->x_awal;
    	$tracking->y_akhir = $request->y_akhir;
    	$tracking->x_akhir = $request->x_akhir;
    	$tracking->save();

    	$res['message'] = "success";
        $res['data'] = $tracking;
        
        return response($res);
    }
    
    public function updateposition(request $request)
    {   
        $data = [];
        $data["y_awal"] = $request->y_awal;
        $data["x_awal"] = $request->x_awal;
        Tracking::where("id_nota", $request->id_nota)->update($data);
        
    	$data 	= Tracking::where("id_nota", $request->id_nota)->get()->first();
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
    
    public function getposition($id)
    {   
    	$data  = Tracking::where("id_nota", $id)->get()->first();
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
