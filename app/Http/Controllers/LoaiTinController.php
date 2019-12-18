<?php

namespace App\Http\Controllers;

use App\Loaitin;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaitins = Loaitin::all();
        return view('layouts.admin.pages.newscategory.newscategory', compact('loaitins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.pages.newscategory.create');
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
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $loaitin = new Loaitin([
            'ten' => $request->get('ten'),
            'mota' => $request->get('mota'),
        ]);

        $loaitin->save();

        return redirect('admin/loaitin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loaitin  $loaitin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loaitin  $loaitin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaitin = Loaitin::find($id);
        if($loaitin != null){
            return view('layouts.admin.pages.newscategory.edit', compact('loaitin'));
        }
        return redirect('admin/loaitin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loaitin  $loaitin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $loaitin = Loaitin::find($id);
        if($loaitin != null){
            $loaitin->ten = $request->get('ten');
            $loaitin->mota = $request->get('mota');

            $loaitin->save();
        }

        return redirect('admin/loaitin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loaitin  $loaitin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaitin = Loaitin::find($id);
        if($loaitin != null) {
            $loaitin->delete();
        }

        return redirect('admin/loaitin');
    }
}
