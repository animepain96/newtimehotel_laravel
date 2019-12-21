<?php

namespace App\Http\Controllers;

use App\Tin;
use App\Tinnhan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TinNhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinnhans = Tinnhan::orderBy('created_at', 'asc')->get();

        return view('layouts.admin.pages.contact.contact', compact('tinnhans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hoten' => 'string|required|max:100',
            'email' => 'email|required',
            'tieude' => 'string|required|max:250',
            'noidung' => 'string|required|max:1000',
        ]);

        if(Tinnhan::where('email', '=', $request->get('email'))->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->count() > 0){
            return redirect('/contact')->with('message', array('status' => 'danger', 'content' => 'Bạn đã gửi tin nhắn trong hôm nay. Vui lòng thử lại sau.'));
        }
        else {

            $tinnhan = new Tinnhan([
                'hoten' => $request->get('hoten'),
                'email' => $request->get('email'),
                'tieude' => $request->get('tieude'),
                'noidung' => $request->get('noidung'),
            ]);

            $tinnhan->save();

            return redirect('/contact')->with('message', array('status' => 'success', 'content' => 'Gửi tin nhắn thành công.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tinnhan  $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function show(Tinnhan $tinnhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tinnhan  $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tinnhan $tinnhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tinnhan  $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tinnhan $tinnhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tinnhan  $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_numeric($id) && $id > 0){
            $tinnhan = Tinnhan::find($id);
            if($tinnhan != null){
                $tinnhan->delete();

                return redirect()->route('tinnhan.index')->with('message', array('status' => 'success', 'content' => 'Xóa Tin nhắn thành công.'));
            }
        }

        return redirect()->route('tinnhan.index')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }
}
