<?php

namespace App\Http\Controllers;

use App\Tin;
use App\Tinnhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TinNhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tinnhans = Tinnhan::orderBy('created_at', 'asc')->get();
        $count_TinNhan = Tinnhan::count();

        return view('layouts.admin.pages.contact.contact', compact(/*'tinnhans'*/ 'count_TinNhan'));
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
        $request->validate([
            'hoten' => 'string|required|max:100',
            'email' => 'email|required',
            'tieude' => 'string|required|max:250',
            'noidung' => 'string|required|max:1000',
            'captcha' => 'required|captcha',
        ]);

        if (Tinnhan::where('email', '=', $request->get('email'))->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->count() > 0) {
            return redirect('/contact')->with('message', array('status' => 'danger', 'content' => 'Bạn đã gửi tin nhắn trong hôm nay. Vui lòng thử lại sau.'));
        } else {

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
     * @param \App\Tinnhan $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function show(Tinnhan $tinnhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Tinnhan $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tinnhan $tinnhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Tinnhan $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tinnhan $tinnhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Tinnhan $tinnhan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_numeric($id) && $id > 0) {
            $tinnhan = Tinnhan::find($id);
            if ($tinnhan != null) {
                $tinnhan->delete();

                return redirect()->route('tinnhan.index')->with('message', array('status' => 'success', 'content' => 'Xóa Tin nhắn thành công.'));
            }
        }

        return redirect()->route('tinnhan.index')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    public function ajaxGetContact(Request $request)
    {
        if ($request->ajax()) {
            $tinnhans = Tinnhan::query();
            return DataTables::eloquent($tinnhans)
                ->filterColumn('created_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->addColumn('action', function ($tinnhan) {
                    $btn = '<a class="btn btn-primary" href="' . url('/admin/mail') . '/' . $tinnhan->email . '" title="Gửi thư">Gửi thư</a>';
                    $btn .= '<form action="' . route('tinnhan.destroy', $tinnhan->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button onclick="return confirm(\'Bạn có muốn xóa Tin nhắn này?\');" class="btn btn-danger" title="Xóa">Xóa</button></form>';
                    return $btn;
                })
                ->editColumn('email', function ($nhantin) {
                    return '<a title="Gửi thư đến: ' . $nhantin->email . '" href="mailto:' . $nhantin->email . '">' . $nhantin->email . '</a>';
                })
                ->editColumn('created_at', function ($nhantin) {
                    return Carbon::make($nhantin->created_at)->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($nhantin) {
                    return Carbon::make($nhantin->updated_at)->format('d/m/Y');
                })
                ->rawColumns(['action', 'email'])
                ->toJson();
        }
        echo 'Bad request';
        die;
    }
}
