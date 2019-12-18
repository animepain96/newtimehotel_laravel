<?php

namespace App\Http\Controllers;

use App\Loaiphong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiphongs = Loaiphong::all();
        return view('layouts.admin.pages.roomtype.roomtype', compact('loaiphongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.pages.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $loaiphong = new Loaiphong([
            'ten' => $request->get('ten'),
            'mota' => $request->get('mota'),
        ]);

        $loaiphong->save();

        return redirect('admin/loaiphong');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Loaiphong $loaiphong
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Loaiphong $loaiphong
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiphong = Loaiphong::find($id);
        if($loaiphong != null){
            return view('layouts.admin.pages.roomtype.edit', compact('loaiphong'));
        }

        return redirect('admin/loaiphong');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Loaiphong $loaiphong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $loaiphong = Loaiphong::find($id);
        if ($loaiphong != null) {
            $loaiphong->ten = $request->get('ten');
            $loaiphong->mota = $request->get('mota');

            $loaiphong->save();
        }

        return redirect('admin/loaiphong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Loaiphong $loaiphong
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaiphong = Loaiphong::find($id);
        if ($loaiphong != null) {
            $loaiphong->delete();
        }

        return redirect('admin/loaiphong');
    }
}
