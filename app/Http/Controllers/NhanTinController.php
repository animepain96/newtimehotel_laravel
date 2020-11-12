<?php

namespace App\Http\Controllers;

use App\Nhantin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NhanTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nhantins = Nhantin::all();
        $count_NhanTin = Nhantin::count();
        return view('layouts.admin.pages.newsletter.newsletter', compact(/*'nhantins'*/ 'count_NhanTin'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Nhantin $nhantin
     * @return \Illuminate\Http\Response
     */
    public function show(Nhantin $nhantin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Nhantin $nhantin
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhantin $nhantin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Nhantin $nhantin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nhantin $nhantin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Nhantin $nhantin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhantin = Nhantin::find($id);
        if ($nhantin != null) {
            $nhantin->delete();
            return redirect('admin/nhantin')->with('message', array('status' => 'success', 'content' => 'Xóa Yêu cầu nhận tin thành công.'));
        }

        return redirect('admin/nhantin')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    public function ajaxGetNewsletter(Request $request)
    {
        if ($request->ajax()) {
            $nhantins = Nhantin::query();
            return DataTables::eloquent($nhantins)
                ->editColumn('email', function ($nhantin) {
                    return '<a title="Gửi thư đến: ' . $nhantin->email . '" href="mailto:' . $nhantin->email . '">' . $nhantin->email . '</a>';
                })
                ->editColumn('created_at', function($nhantin){
                    return Carbon::make($nhantin->created_at)->format('d/m/Y');
                })
                ->editColumn('updated_at', function($nhantin){
                    return Carbon::make($nhantin->updated_at)->format('d/m/Y');
                })
                ->addColumn('action', function ($nhantin) {
                    $btn = '<a class="btn btn-primary" href="' . url('/admin/mail') . '/' . $nhantin->email . '" title="Gửi thư">Gửi thư</a>';
                    $btn .= '<form action="' . route('nhantin.destroy', $nhantin->id) . ' method="post">' . csrf_field() . method_field('delete') . '<button onclick="return confirm(\'Bạn có muốn xóa Địa chỉ Email này?\');" class="btn btn-danger" title="Xóa">Xóa</button></form>';
                    return $btn;
                })
                ->rawColumns(['action', 'email'])
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
