<?php

namespace App\Http\Controllers;

use App\Khachhang;
use App\Nhantin;
use App\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($email = null){
        return view('layouts.admin.pages.mail.mail', compact('email'));
    }

    public function sendmail(Request $request){
        if($request->has('option') && $request->get('email') == null){

            $request->validate([
                'option' => 'integer|required|min:1|max:3',
                'content' => 'required|string',
                'subject' => 'required|max:250',
            ]);

            $option = $request->has('option');
            switch ($option){
                case 1:
                    $emails = Nhantin::all()->pluck('email')->toArray();
                    break;
                case 2:
                    $emails = Khachhang::all()->pluck('email')->toArray();
                    break;
                case 3:
                    $emails = Nhanvien::all()->pluck('email')->toArray();
                    break;
            }

            print_r($emails);

            $subject = $request->get('subject');

            $data = ['content' => $request->get('content')];

            Mail::send('layouts.admin.layouts.mail', $data, function($message) use ($emails, $subject){
                $message->to($emails)
                    ->subject($subject);
                $message->from('newtimehotel.laravel@gmail.com', 'NewTime Hotel');
            });
        }
        else if($request->get('email') != null){
            $request->validate([
                'email' => 'required|email',
                'content' => 'required|string',
                'subject' => 'required|max:250',
            ]);

            $email = $request->get('email');
            $subject = $request->get('subject');
            $data = ['content' => $request->get('content')];

            Mail::send('layouts.admin.layouts.mail', $data, function($message) use ($email, $subject){
                $message->to($email)
                    ->subject($subject);
                $message->from('newtimehotel.laravel@gmail.com', 'NewTime Hotel');
            });
        }

        return redirect('admin/mail')->with('message', array('status' => 'success', 'content' => 'Gửi thư thành công.'));

    }
}
