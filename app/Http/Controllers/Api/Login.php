<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Karyawan;
use DB;

class Login extends Controller
{
	public function getLogin($email, $pass)
	{  
     	$user = User::where("username", $email)->orWhere("email", $email)->get()->first();
     	$kurir = Karyawan::where("user_id", $user->id)->where("jabatan_id", "6")->get()->first();
        
     	if(!is_null($kurir)){ //mengecek apakah data kosong atau tidak
            $res['message'] = "success";
            $res['data'] = $kurir;
            
            return response($res);
        }
        else{
            $res['message'] = "error";

            return response($res);
        }
	} 
}
