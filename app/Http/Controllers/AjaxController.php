<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diachi;

class AjaxController extends Controller
{
    public function getCity($idtinh){
        if(is_numeric($idtinh)){
            return response()->json(['status' => 'success', 'data' => Diachi::where('idtinh', $idtinh)->get()]);
        }
        return response()->json(['status' => 'error', 'message' => 'Not a integer.']);
    }
}
