<?php

namespace App\Http\Controllers;

use App\Loaitin;
use App\Tin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mews\Purifier\Facades\Purifier as Purifier;
use Yajra\DataTables\Facades\DataTables;

class TinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$tins = Tin::with('nhanvien', 'loaitin')->get();*/
        $count_Tin = Tin::count();
        $message = session()->get('message');
        return view('layouts.admin.pages.news.news', compact(/*'tins', */ 'message', 'count_Tin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaitins = Loaitin::all();
        return view('layouts.admin.pages.news.create', compact('loaitins'));
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
            'tieude' => 'string|required|max:250',
            'mota' => 'string|required|max:500',
            'noidung' => 'string|required',
            'anhdaidien' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
            'loaitin' => 'integer|required',
            'hoatdong' => 'nullable',
        ]);

        if ($request->hasFile('anhdaidien')) {
            $anhdaidien = time() . '.' . $request->file('anhdaidien')->getClientOriginalExtension();
        } else {
            $anhdaidien = '';
        }

        $tin = new Tin([
            'tieude' => $request->get('tieude'),
            'mota' => $request->get('mota'),
            'noidung' => $request->get('noidung'),
            'anhdaidien' => $anhdaidien,
            'idnhanvien' => Auth::guard('nhanvien')->user()->id,
            'idloaitin' => $request->get('loaitin'),
            'hoatdong' => $request->has('hoatdong'),
        ]);

        $tin->save();

        if ($anhdaidien != '') {
            request()->file('anhdaidien')->move(public_path('images/news'), $anhdaidien);
        }

        return redirect('admin/tin')->with('message', array('status' => 'success', 'content' => 'Thêm Tin tức thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Tin $tin
     * @return \Illuminate\Http\Response
     */
    public function show(Tin $tin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Tin $tin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tin = Tin::find($id);

        if ($tin != null) {
            $loaitins = Loaitin::all();
            return view('layouts.admin.pages.news.edit', compact('tin', 'loaitins'));
        }

        return redirect('admin/tin')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy Tin tức. Vui lòng thử lại sau.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Tin $tin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tieude' => 'string|required|max:250',
            'mota' => 'string|required|max:500',
            'noidung' => 'string|required',
            'anhdaidien' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
            'loaitin' => 'integer|required',
            'hoatdong' => 'nullable',
        ]);

        $tin = Tin::find($id);
        if ($tin != null) {
            $tin->tieude = $request->get('tieude');
            $tin->mota = $request->get('mota');
            $tin->noidung = Purifier::clean($request->get('noidung'));
            $tin->idloaitin = $request->get('loaitin');
            $tin->hoatdong = $request->has('hoatdong');

            if ($request->hasFile('anhdaidien')) {
                $anhdaidien = time() . '.' . $request->file('anhdaidien')->getClientOriginalExtension();
                File::delete(public_path('images/news') . '\\' . $tin->anhdaidien);
                request()->file('anhdaidien')->move(public_path('images/news'), $anhdaidien);
                $tin->anhdaidien = $anhdaidien;
            }

            $tin->save();

            return redirect()->route('tin.index')->with('message', array('status' => 'success', 'content' => 'Cập nhật Tin tức thành công.'));
        }

        return redirect()->route('tin.index')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy Tin tức. Vui lòng thử lại sau.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Tin $tin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tin = Tin::find($id);
        if ($tin != null) {
            File::delete(public_path('images/news') . '\\' . $tin->anhdaidien);
            $tin->delete();
            return redirect()->route('tin.index')->with('message', array('status' => 'success', 'content' => 'Xóa Tin tức thành công.'));
        }
        return redirect()->route('tin.index')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy dữ liệu Tin tức. Vui lòng thử lại sau.'));
    }

    public function ajaxGetNews(Request $request)
    {
        if ($request->ajax()) {
            $tins = Tin::with('nhanvien', 'loaitin');
            return DataTables::eloquent($tins)
                ->editColumn('anhdaidien', function ($tin) {
                    return '<img alt="' . $tin->tieude . '" class="img-thumbnail" src="' . asset('images/news/' . $tin->anhdaidien) . '">';
                })
                ->editColumn('hoatdong', function ($tin) {
                    return '<input type="checkbox" disabled ' . ($tin->hoatdong ? ' checked' : '') . '>';
                })
                ->editColumn('created_at', function ($tin) {
                    return Carbon::make($tin->created_at)->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($tin) {
                    return Carbon::make($tin->updated_at)->format('d/m/Y');
                })
                ->addColumn('action', function ($tin) {
                    $btn = '<form action="' . route('tin.destroy', $tin->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Tin tức này?\');" type="submit">Xóa</button></form>';
                    $btn .= '<a class="btn btn-primary" href="' . route('tin.edit', $tin->id) . '">Sửa</a>';
                    return $btn;
                })
                ->rawColumns(['anhdaidien', 'action', 'hoatdong'])
                ->toJson();
        }
        echo 'Bad request';
        die;
    }
}
