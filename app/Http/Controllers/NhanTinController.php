<?php

namespace App\Http\Controllers;

use App\Nhantin;
use Illuminate\Http\Request;

class NhanTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhantins = Nhantin::all();

        return view('layouts.admin.pages.newsletter.newsletter', compact('nhantins'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nhantin  $nhantin
     * @return \Illuminate\Http\Response
     */
    public function show(Nhantin $nhantin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nhantin  $nhantin
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhantin $nhantin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nhantin  $nhantin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nhantin $nhantin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nhantin  $nhantin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhantin = Nhantin::find($id);
        if($nhantin != null){
            $nhantin->delete();
        }

        return redirect('admin/nhantin');
    }
}
