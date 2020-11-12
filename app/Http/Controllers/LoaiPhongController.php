<?php

namespace App\Http\Controllers;

use App\Loaiphong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LoaiPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$loaiphongs = Loaiphong::all();
        $count_LoaiPhong = Loaiphong::count();
        return view('layouts.admin.pages.roomtype.roomtype', compact(/*'loaiphongs'*/ 'count_LoaiPhong'));
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

        return redirect('admin/loaiphong')->with('message', array('status' => 'success', 'content' => 'Thêm Loại phòng thành công.'));
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
        if ($loaiphong != null) {
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

            return redirect('admin/loaiphong')->with('message', array('status' => 'success', 'content' => 'Cập nhật Loại phòng thành công.'));

        }

        return redirect('admin/loaiphong')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
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
            return redirect('admin/loaiphong')->with('message', array('status' => 'success', 'content' => 'Xóa Loại phòng thành công.'));
        }
        return redirect('admin/loaiphong')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    public function ajaxGetRoomType(Request $requset)
    {
        if ($requset->ajax()) {
            $loaiphongs = Loaiphong::query();
            return DataTables::eloquent($loaiphongs)
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw('DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?', ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function ($query, $keyword) {
                    $query->whereRaw('DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?', ["{$keyword}%"]);
                })
                ->editColumn('created_at', function ($loaiphong) {
                    return $loaiphong->created_at->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($loaiphong) {
                    return $loaiphong->updated_at->format('d/m/Y');
                })
                ->addColumn('action', function ($loaiphong) {
                    $btn = '<form action="' . route('loaiphong.destroy', $loaiphong->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Loại phòng này?\');" type="submit">Xóa</button></form>';
                    $btn .= '<a class="btn btn-primary" href="' . route('loaiphong.edit', $loaiphong->id) . '">Sửa</a>';
                    return $btn;
                })
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
