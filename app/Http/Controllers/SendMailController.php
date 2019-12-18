<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function index($email = null){
        return view('layouts.admin.pages.sendmail.sendmail', compact('email'));
    }

    public function sendmail(Request $request){
        if($request->has('option')){
            $option = $request->has('option');
            switch ($option){
                case 0:

                    break;
            }
        }
    }
}
