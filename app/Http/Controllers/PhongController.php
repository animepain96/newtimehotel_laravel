<?php

namespace App\Http\Controllers;

use App\Anhmota;
use App\Loaiphong;
use App\Phong;
use App\Vitri;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use function MongoDB\BSON\toJSON;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$phongs = Phong::with('banggia', 'vitri', 'loaiphong')->get();
        return view('layouts.admin.pages.room.room', compact('phongs'));*/
        return view('layouts.admin.pages.room.room')->withQuantity(Phong::count());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiphongs = Loaiphong::all();
        $vitris = Vitri::all();
        return view('layouts.admin.pages.room.create', compact('loaiphongs', 'vitris'));
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
            'tenphong' => 'required|string|max:250',
            'tienich' => 'required|string|max:250',
            'songuoilon' => 'required|integer|gt:0',
            'sotreem' => 'required|integer|gte:0',
            'dientich' => 'required|numeric|gte:0',
            'sogiuong' => 'required|integer|gte:0',
            'loaiphong' => 'required|integer|gte:0',
            'vitri' => 'required|integer|gte:0',
            'hinhdaidien' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
            'anhmota' => 'nullable',
            'anhmota.*' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
        ]);

        if ($request->hasFile('hinhdaidien')) {
            $hinhdaidien = time() . '.' . $request->file('hinhdaidien')->getClientOriginalExtension();
        } else {
            $hinhdaidien = '';
        }

        $phong = new Phong([
            'tenphong' => $request->get('tenphong'),
            'tienich' => $request->get('tienich'),
            'songuoilon' => $request->get('songuoilon'),
            'sotreem' => $request->get('sotreem'),
            'dientich' => $request->get('dientich'),
            'sogiuong' => $request->get('sogiuong'),
            'idloai' => $request->get('loaiphong'),
            'idvitri' => $request->get('vitri'),
            'hinhdaidien' => $hinhdaidien,
        ]);

        $phong->save();

        if ($request->hasFile('hinhdaidien')) {
            request()->file('hinhdaidien')->move(public_path('images/room'), $hinhdaidien);
        }

        if ($request->hasFile('anhmota')) {
            $i = 0;
            foreach ($request->file('anhmota') as $tmp_des_img) {
                $des_image = (time() + $i) . '.' . $tmp_des_img->getClientOriginalExtension();
                $tmp_des_img->move(public_path('images/description'), $des_image);
                $anhmota = new Anhmota([
                    'idphong' => $phong->id,
                    'urlanh' => $des_image,
                ]);
                $anhmota->save();
                $i++;
            }
        }

        return redirect()->route('phong.index')->with('message', array('status' => 'success', 'content' => 'Thêm Phòng thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Phong $phong
     * @return \Illuminate\Http\Response
     */
    public function show(Phong $phong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Phong $phong
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phong = Phong::where('id', '=', $id)->with('loaiphong', 'vitri', 'anhmota')->first();
        $loaiphongs = Loaiphong::all();
        $vitris = Vitri::all();
        if ($phong != null) {
            $message = session()->get('message');
            return view('layouts.admin.pages.room.edit', compact('phong', 'loaiphongs', 'vitris', 'message'));
        }
        return redirect()->route('phong.index')->with('message', array('status' => 'danger', 'content' => 'Không thể tìm thấy thông tin. Vui lòng thử lại sau.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Phong $phong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phong = Phong::find($id);

        if ($phong != null) {
            if ($request->has('delete') && $request->has('des_img')) {
                $request->validate([
                    'des_img' => 'required|integer|gt:0',
                ]);

                $anhmota = Anhmota::find($request->get('des_img'));
                if ($anhmota != null) {
                    File::delete(public_path('images/description') . '\\' . $anhmota->urlanh);
                    $anhmota->delete();
                    return redirect()->route('phong.edit', $id)->with('message', array('status' => 'success', 'content' => 'Xóa Ảnh mô tả thành công.'));
                }
            }
            if ($request->has('info')) {
                $request->validate([
                    'tenphong' => 'required|string|max:250',
                    'tienich' => 'required|string|max:250',
                    'songuoilon' => 'required|integer|gt:0',
                    'sotreem' => 'required|integer|gte:0',
                    'dientich' => 'required|numeric|gt:0',
                    'sogiuong' => 'required|integer|gt:0',
                    'loaiphong' => 'required|integer|gt:0',
                    'vitri' => 'required|integer|gt:0',
                    'hoatdong' => 'nullable',
                    'ghichu' => 'nullable|string|max:500',
                ]);

                $phong->tenphong = $request->get('tenphong');
                $phong->tienich = $request->get('tienich');
                $phong->songuoilon = $request->get('songuoilon');
                $phong->sotreem = $request->get('sotreem');
                $phong->dientich = $request->get('dientich');
                $phong->sogiuong = $request->get('sogiuong');
                $phong->idloai = $request->get('loaiphong');
                $phong->idvitri = $request->get('vitri');
                $phong->hoatdong = $request->has('hoatdong');
                $phong->ghichu = $request->get('ghichu');

                $phong->save();

                return redirect()->route('phong.edit', $id)->with('message', array('status' => 'success', 'content' => 'Cập nhật Thông tin Phòng thành công.'));
            }
            if ($request->has('image')) {
                $request->validate([
                    'hinhdaidien' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
                ]);

                $hinhdaidien = time() . '.' . $request->file('hinhdaidien')->getClientOriginalExtension();
                File::delete(public_path('images/room') . '\\' . $phong->hinhdaidien);
                $request->file('hinhdaidien')->move(public_path('images/room'), $hinhdaidien);
                $phong->hinhdaidien = $hinhdaidien;
                $phong->save();

                return redirect()->route('phong.edit', $id)->with('message', array('status' => 'success', 'content' => 'Cập nhật Ảnh thành công.'));
            }
            if ($request->has('des_img')) {
                $i = 0;
                foreach ($request->file('anhmota') as $tmp_des_img) {
                    $des_image = (time() + $i) . '.' . $tmp_des_img->getClientOriginalExtension();
                    $tmp_des_img->move(public_path('images/description'), $des_image);
                    $anhmota = new Anhmota([
                        'idphong' => $phong->id,
                        'urlanh' => $des_image,
                    ]);
                    $anhmota->save();
                    $i++;
                }

                return redirect()->route('phong.edit', $id)->with('message', array('status' => 'success', 'content' => 'Thêm Ảnh mô tả thành công.'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Phong $phong
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $phong = Phong::find($id);
            if ($phong != null) {
                $des_imgs = Anhmota::where('idphong', '=', $id)->get();
                foreach ($des_imgs as $des_img) {
                    File::delete(public_path('images/description') . '\\' . $des_img->urlanh);
                }

                File::delete(public_path('images/room') . '\\' . $phong->hinhdaidien);

                $phong->delete();

                return redirect()->route('phong.index')->with('message', array('status' => 'success', 'content' => 'Xóa Phòng thành công.'));
            }
            return redirect()->route('phong.index')->with('message', array('status' => 'danger', 'content' => 'Không tìm thấy thông tin. Vui lòng thử lại sau.'));

        } catch (\Exception $ex) {
            return redirect()->route('phong.index')->with('message', array('status' => 'danger', 'content' => 'Không tìm thấy thông tin. Vui lòng thử lại sau.'));
        }
    }

    public function ajaxGetRoom(Request $request)
    {
        if ($request->ajax()) {
            $phongs = Phong::with('banggia', 'vitri', 'loaiphong');
            return DataTables::eloquent($phongs)
                ->addIndexColumn()
                ->filterColumn('created_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('hinhdaidien', function ($phong) {
                    return '<img class="img-thumbnail" src="' . asset('images/room/' . $phong->hinhdaidien) . '">';
                })
                ->editColumn('created_at', function ($phong) {
                    return $phong->created_at->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($phong) {
                    return $phong->updated_at->format('d/m/Y');
                })
                ->editColumn('dientich', function ($phong) {
                    return sprintf('%s&#13217;', $phong->dientich);
                })
                ->editColumn('hoatdong', function ($phong) {
                    return '<input type="checkbox" ' . ($phong->hoatdong ? 'checked' : '') . ' disabled>';
                })
                ->addColumn('action', function ($phong) {
                    $actionColumn = '<form action="' . route('phong.destroy', $phong->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button title="Xóa" class="btn btn-sm btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Người dùng này?\');" type="submit">Xóa</button></form>';
                    $actionColumn .= '<a title="Sửa" href="' . route('phong.edit', $phong->id) . '" class="btn btn-sm btn-primary">Sửa</a>';
                    $actionColumn .= '<a title="Quản lí Giá" href="' . url('admin/gia/' . $phong->id) . '" class="btn btn-sm btn-warning">Giá</a>';
                    return $actionColumn;
                })
                ->rawColumns(['hinhdaidien', 'dientich', 'hoatdong', 'action'])
                ->toJson();
        }
        echo 'Bad request';
        die();
    }
}
