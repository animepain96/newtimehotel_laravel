<?php

namespace App\Http\Controllers;

use App\Phong;
use App\Thue;
use App\Trangthaithue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ThueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $summary = array();
        $summary['tongcong'] = Thue::all()->count();
        $summary['moi'] = Thue::whereMonth('created_at', '=', Carbon::now()->month)->count();
        $summary['huy'] = Thue::where('idtrangthai', '=', 4)->count();
        $summary['datphong'] = Thue::where('idtrangthai', '=', 1)->count();
        $summary['xacnhan'] = Thue::where('idtrangthai', '=', 2)->count();
        $summary['nhanphong'] = Thue::where('idtrangthai', '=', 3)->count();
        $summary['dathanhtoan'] = Thue::where('idtrangthai', '=', 5)->count();

        return view('layouts.admin.pages.reservation.reservation', compact('summary'));
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
     * @param \App\Thue $thue
     * @return \Illuminate\Http\Response
     */
    public function show(Thue $thue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Thue $thue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thue = Thue::with('trangthaithue', 'phong', 'khachhang')->where('id', '=', $id)->first();
        $dangthues = Thue::whereDate('ketthuc', '>=', Carbon::now())->where('idtrangthai', '<', 4)->where('id', '!=', $id)->where('idphong', '=', $thue->phong['id'])->get();
        return view('layouts.admin.pages.reservation.edit', compact('thue', 'dangthues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Thue $thue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idphong' => ['integer', 'required', Rule::in(Phong::all()->pluck('id'))],
            'batdau' => 'required|date_format:d/m/Y',
            'ketthuc' => ['required', 'date_format:d/m/Y', 'after_or_equal:batdau'],
            'trangthaithue' => ['required', 'integer', Rule::in(Trangthaithue::all()->pluck('id'))],
            'ghichu' => 'nullable|string|max:500',
        ]);

        $thue = Thue::find($id);
        if ($thue != null) {

            $idphong = $request->get('idphong');
            $batdau = Carbon::createFromFormat('d/m/Y', $request->get('batdau'));
            $ketthuc = Carbon::createFromFormat('d/m/Y', $request->get('ketthuc'));

            $is_valid = Thue::where('id', '!=', $id)
                ->where('idphong', '=', $idphong)
                ->where(function ($query) use ($batdau, $ketthuc) {
                    $query->orwhere(function ($query) use ($batdau) {
                        $query->where('batdau', '<=', $batdau)->where('ketthuc', '>=', $batdau);
                    })->orwhere(function ($query) use ($ketthuc) {
                        $query->where('batdau', '<=', $ketthuc)->where('ketthuc', '>=', $ketthuc);
                    })->orwhere(function ($query) use ($batdau, $ketthuc) {
                        $query->where('batdau', '>=', $batdau)->where('ketthuc', '<=', $ketthuc);
                    });
                })
                ->get();

            if (count($is_valid) <= 0) {
                $thue->batdau = $batdau;
                $thue->ketthuc = $ketthuc;
                $thue->idtrangthai = $request->get('trangthaithue');
                $thue->ghichu = $request->get('ghichu');

                $thue->save();

                return redirect()->route('thue.index')->with('message', array('status' => 'success', 'content' => 'Cập nhật thông tin Phiếu thành công.'));
            }

            return redirect()->route('thue.edit', $id)->with('message', array('status' => 'danger', 'content' => 'Ngày tháng không hợp lệ. Vui lòng chọn lại.'));
        }

        return redirect()->route('thue.index')->with('message', array('status' => 'danger', 'content' => 'Không tìm thấy thông tin. Vui lòng thử lại sau.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Thue $thue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thue = Thue::find($id);
        if ($thue != null) {
            $thue->delete();
            return redirect()->route('thue.index')->with('message', array('status' => 'success', 'content' => 'Xóa Phiếu thuế thành công.'));
        }

        return redirect()->route('thue.index')->with('message', array('status' => 'danger', 'content' => 'Không thể tìm thấy thông tin. Vui lòng thử lại sau.'));
    }

    public function ajaxGetReservation(Request $request)
    {
        if ($request->ajax()) {
            $thues = Thue::with('phong', 'khachhang', 'trangthaithue');
            return DataTables::eloquent($thues)
                ->addIndexColumn()
                ->filterColumn('created_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('batdau', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(batdau, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('ketthuc', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(ketthuc, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('khachhang', function ($thue) {
                    return '<a title="' . $thue->khachhang->tendangnhap . '" href="' . route('khachhang.edit', $thue->khachhang->id) . '">' . $thue->khachhang->hoten . '</a>';
                })
                ->editColumn('phong', function ($thue) {
                    return '<a title="' . $thue->phong->tenphong . '" href="' . route('phong.edit', $thue->phong->id) . '">' . $thue->phong->tenphong . '</a>';
                })
                ->editColumn('trangthai', function ($thue) {
                    $trangthai = $thue->trangthaithue->id;
                    $text = '<label class="%s">' . $thue->trangthaithue->mota . '</label>';
                    switch ($trangthai) {
                        case 0:
                            $text = sprintf($text, 'bg-info');
                            break;
                        case 1:
                            $text = sprintf($text, 'bg-warning');
                            break;
                        case 2:
                            $text = sprintf($text, 'bg-blue');
                            break;
                        case 3:
                            $text = sprintf($text, 'bg-danger');
                            break;
                        case 4:
                            $text = sprintf($text, 'bg-primary');
                            break;
                        default:
                            $text = sprintf($text, 'bg-success');
                    }

                    return $text;
                })
                ->editColumn('created_at', function ($thue) {
                    return $thue->created_at->format('d/m/Y');
                })
                ->editColumn('batdau', function ($thue) {
                    return Carbon::make($thue->batdau)->format('d/m/Y');
                })
                ->editColumn('ketthuc', function ($thue) {
                    return Carbon::make($thue->ketthuc)->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($thue) {
                    return $thue->updated_at->format('d/m/Y');
                })
                ->addColumn('action', function ($thue) {
                    $btn = '<form action="' . route('thue.destroy', $thue->id) . '" method="post">' . csrf_field() . method_field('delete') . ' <button title="Xóa" class="btn btn-danger" onclick="return confirm("Bạn có chắc chắn muốn xóa Phiếu thuê này?");" type="submit">Xóa</button></form>';
                    $btn .= '<a title="Sửa" class="btn btn-primary" href="' . route('thue.edit', $thue->id) . '">Sửa</a>';
                    if ($thue->trangthaithue->id === 5) {
                        $btn .= '<a title="Hóa đơn" class="btn btn-warning" href="' . url('admin/invoice/' . $thue->id) . '">Hóa đơn</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'khachhang', 'phong', 'trangthai'])
                ->toJson();
        }

        echo 'Bad request';
        die();
    }
}
