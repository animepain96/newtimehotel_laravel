<?php

namespace App\Http\Controllers;

use App\Slideshow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$slideshows = Slideshow::all();
        $count_SlideShow = Slideshow::count();
        return view('layouts.admin.pages.slideshow.slideshow', compact('count_SlideShow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.pages.slideshow.create');
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
            'tieude' => 'required|max:250',
            'mota' => 'nullable|max:250',
            'lienket' => 'nullable|url',
            'hoatdong' => 'nullable',
            'urlanh' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
        ]);

        if ($request->hasFile('urlanh')) {
            $urlanh = time() . '.' . $request->file('urlanh')->getClientOriginalExtension();
        } else {
            $urlanh = '';
        }

        $slideshow = new Slideshow([
            'tieude' => $request->get('tieude'),
            'mota' => $request->get('mota'),
            'lienket' => $request->get('lienket'),
            'hoatdong' => $request->has('hoatdong'),
            'urlanh' => $urlanh
        ]);

        $slideshow->save();

        if ($urlanh != '') {
            request()->file('urlanh')->move(public_path('images/slideshow'), $urlanh);
        }

        return redirect('admin/slideshow')->with('message', array('status' => 'success', 'content' => 'Thêm Slideshow thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Slideshow $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Slideshow $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slideshow = Slideshow::find($id);
        if ($slideshow != null) {
            return view('layouts.admin.pages.slideshow.edit', compact('slideshow'));
        }

        return redirect('admin/slideshow')->with('message', array('status' => 'danger', 'content' => 'Không thể tìm thấy thông tin. Vui lòng thử lại sau.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Slideshow $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tieude' => 'required|max:250',
            'mota' => 'nullable|max:250',
            'lienket' => 'nullable|url',
            'hoatdong' => 'nullable',
            'urlanh' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
        ]);

        $slideshow = Slideshow::find($id);
        if ($slideshow != null) {

            $slideshow->tieude = $request->get('tieude');
            $slideshow->mota = $request->get('mota');
            $slideshow->lienket = $request->get('lienket');
            $slideshow->hoatdong = $request->has('hoatdong');

            if ($request->hasFile('urlanh')) {
                File::delete(public_path('images/slideshow') . '\\' . $slideshow->urlanh);
                $urlanh = time() . '.' . $request->file('urlanh')->getClientOriginalExtension();
                request()->file('urlanh')->move(public_path('images/slideshow'), $urlanh);
                $slideshow->urlanh = $urlanh;
            } else {
                $urlanh = '';
            }

            $slideshow->save();

        }

        return redirect('admin/slideshow')->with('message', array('status' => 'success', 'content' => 'Cập nhật Slideshow thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Slideshow $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideshow = Slideshow::find($id);
        if ($slideshow != null) {
            $slideshow->delete();
            return redirect('admin/slideshow')->with('message', array('status' => 'success', 'content' => 'Xóa Slideshow thành công.'));
        }

        return redirect('admin/slideshow')->with('message', array('status' => 'danger', 'content' => 'Không tìm thấy thông tin. Vui lòng thử lại sau.'));;
    }

    public function ajaxGetSlideShow(Request $request)
    {
        if ($request->ajax()) {
            $slideShows = Slideshow::query();
            return DataTables::eloquent($slideShows)
                ->filterColumn('created_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('urlanh', function ($slideShow) {
                    return '<img class="img-thumbnail" alt="' . $slideShow->tieude . '" src="' . asset('images/slideshow/' . $slideShow->urlanh) . '" />';
                })
                ->editColumn('hoatdong', function ($slideShow) {
                    return '<input type="checkbox" disabled ' . ($slideShow->hoatdong ? 'checked' : '') . '>';
                })
                ->editColumn('created_at', function ($slideShow) {
                    return Carbon::make($slideShow->created_at)->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($slideShow) {
                    return Carbon::make($slideShow->updated_at)->format('d/m/Y');
                })
                ->addColumn('action', function ($slideShow) {
                    $btn = '<form action="' . route('slideshow.destroy', $slideShow->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Slideshow này?\');" type="submit">Xóa</button></form>';
                    $btn .= '<a class="btn btn-primary" href="' . route('slideshow.edit', $slideShow->id) . '">Sửa</a>';
                    return $btn;
                })
                ->rawColumns(['urlanh', 'action', 'hoatdong'])
                ->toJson();
        }
        echo 'Bad request';
        die;
    }
}
