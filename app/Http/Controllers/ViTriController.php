<?php

namespace App\Http\Controllers;

use App\Vitri;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ViTriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vitris = Vitri::all();
        $count_ViTri = Vitri::count();
        return view('layouts.admin.pages.location.location', compact(/*'vitris'*/ 'count_ViTri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.pages.location.create');
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

        $vitri = new Vitri([
            'ten' => $request->get('ten'),
            'mota' => $request->get('mota'),
        ]);

        $vitri->save();

        return redirect('admin/vitri')->with('message', array('status' => 'success', 'content' => 'Thêm Vị trí thành công.'));;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Vitri $vitri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Vitri $vitri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitri = Vitri::find($id);
        if ($vitri != null) {
            return view('layouts.admin.pages.location.edit', compact('vitri'));
        }
        return redirect('admin/vitri');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Vitri $vitri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $vitri = Vitri::find($id);

        if ($vitri != null) {
            $vitri->ten = $request->get('ten');
            $vitri->mota = $request->get('mota');

            $vitri->save();

            return redirect('admin/vitri')->with('message', array('status' => 'success', 'content' => 'Cập nhật Vị trí thành công.'));
        }

        return redirect('admin/vitri')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thư lại sau.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Vitri $vitri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitri = Vitri::find($id);
        if ($vitri != null) {
            $vitri->delete();
            return redirect('admin/vitri')->with('message', array('status' => 'success', 'content' => 'Xóa Vị trí thành công.'));
        }
        return redirect('admin/vitri')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thư lại sau.'));
    }

    public function ajaxGetLocation(Request $request)
    {
        if ($request->ajax()) {
            $vitris = Vitri::query();
            return DataTables::eloquent($vitris)
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
                ->addColumn('action', function ($vitri) {
                    $btn = '<form action="' . route('vitri.destroy', $vitri->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Vị trí này?\');" type="submit">Xóa</button></form>';
                    $btn .= '<a class="btn btn-primary" href="' . route('vitri.edit', $vitri->id) . '">Sửa</a>';
                    return $btn;
                })
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
