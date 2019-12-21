<?php

namespace App\Http\Controllers\Home;

use App\Bodem;
use App\Phong;
use App\Thue;
use App\Banggia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function getRoom()
    {
        $rooms = \App\Phong::with('vitri', 'loaiphong')
            ->join('banggias', 'phongs.id', 'banggias.idphong')
            ->whereIn('phongs.id', \App\Banggia::whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d'))->get()->pluck('idphong'))
            ->paginate(6);
        return view('layouts.home.pages.room', compact('rooms'));
    }

    public function searchRoom()
    {
        $batdau = request()->get('batdau') ?? Carbon::now()->format('d/m/Y');
        $ketthuc = request()->get('ketthuc') ?? Carbon::now()->format('d/m/Y');
        $loaiphong = request()->get('loaiphong') ?? 0;
        $vitri = request()->get('vitri') ?? 0;
        $songuoilon = request()->get('songuoilon') ?? 0;
        $sotreem = is_int(request()->get('sotreem')) ? request()->get('sotreem') : -1;
        $sogiuong = request()->get('sogiuong') ?? 0;

        $batdau = Carbon::createFromFormat('d/m/Y', $batdau)->format('Y-m-d');
        $ketthuc = Carbon::createFromFormat('d/m/Y', $ketthuc)->format('Y-m-d');

        $rooms = Phong::with('vitri', 'loaiphong')
            ->join('banggias', 'phongs.id', 'banggias.idphong')
            ->whereNotIn('phongs.id',
                Thue::where(function ($query) use ($batdau, $ketthuc) {
                    $query->orwhere(function ($query) use ($batdau) {
                        $query->where('batdau', '<=', $batdau)->where('ketthuc', '>=', $batdau);
                    })->orwhere(function ($query) use ($ketthuc) {
                        $query->where('batdau', '<=', $ketthuc)->where('ketthuc', '>=', $ketthuc);
                    })->orwhere(function ($query) use ($batdau, $ketthuc) {
                        $query->where('batdau', '>=', $batdau)->where('ketthuc', '<=', $ketthuc);
                    });
                })->where('idtrangthai', '<', 4)->pluck('idphong'))
            ->whereIn('phongs.id', Banggia::whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d'))->get()->pluck('idphong'))
            ->where(function ($query) use ($songuoilon, $sotreem, $sogiuong) {
                $query->where(function ($query) use ($songuoilon) {
                    $query->orWhere('songuoilon', '=', $songuoilon)
                        ->orWhereRaw('? = 0', $songuoilon);
                })->where(function ($query) use ($sotreem) {
                    $query->orWhere('sotreem', '=', $sotreem)
                        ->orWhereRaw('? = -1', $sotreem);
                })->where(function ($query) use ($sogiuong) {
                    $query->orWhere('sogiuong', '=', $sogiuong)
                        ->orWhereRaw('? = 0', $sogiuong);
                });
            })
            ->where(function ($query) use ($loaiphong) {
                $query->orWhere('idloai', '=', $loaiphong)
                    ->orWhereRaw('? = 0', $loaiphong);
            })
            ->where(function ($query) use ($vitri) {
                $query->orWhere('idvitri', '=', $vitri)
                    ->orWhereRaw('? = 0', $vitri);
            })
            ->paginate(9);
        return view('layouts.home.pages.search', compact('rooms'));
    }

    public function getNews()
    {
        return view('layouts.home.pages.news');
    }

    public function getSingleNews($id)
    {
        $tin = \App\Tin::with('nhanvien', 'loaitin')->where('id', '=', $id)->first();
        if ($tin != null)
            return view('layouts.home.pages.news-single', compact('tin'));
        else
            return redirect()->back();
    }

    public function getSingleRoom($id)
    {
        $phong = Phong::with('vitri', 'loaiphong', 'anhmota')
            ->where('phongs.id', '=', $id)
            ->join('banggias', 'phongs.id', 'banggias.idphong')
            ->whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d'))
            ->first();
        if ($phong != null) {
            $thues = Thue::where('idtrangthai', '<', 4)
                ->where('ketthuc', '>=', Carbon::now()->format('Y-m-d'))
                ->where('idphong', '=', $id)
                ->get();
            return view('layouts.home.pages.room-single', compact('phong', 'thues'));
        }

        return redirect('/room');
    }

    public function postReservation(Request $request)
    {
        $request->validate([
            'idphong' => array('required', Rule::in(Phong::all()->pluck('id'))),
            'batdau' => 'required|date_format:d/m/Y',
            'ketthuc' => 'required|date_format:d/m/Y|after_or_equal:batdau',
        ]);

        $batdau = Carbon::createFromFormat('d/m/Y', $request->get('batdau'))->format('Y-m-d');
        $ketthuc = Carbon::createFromFormat('d/m/Y', $request->get('ketthuc'))->format('Y-m-d');

        $is_valid = Phong::where('phongs.id', '=', $request->get('idphong'))
            ->join('banggias', 'phongs.id', 'banggias.idphong')
            ->whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d'))
            ->whereNotIn('phongs.id', Thue::where('idphong', '=', $request->get('idphong'))
                ->where('idtrangthai', '<', 4)
                ->where(function ($query) use ($batdau, $ketthuc) {
                    $query->orwhere(function ($query) use ($batdau) {
                        $query->where('batdau', '<=', $batdau)->where('ketthuc', '>=', $batdau);
                    })->orwhere(function ($query) use ($ketthuc) {
                        $query->where('batdau', '<=', $ketthuc)->where('ketthuc', '>=', $ketthuc);
                    })->orwhere(function ($query) use ($batdau, $ketthuc) {
                        $query->where('batdau', '>=', $batdau)->where('ketthuc', '<=', $ketthuc);
                    });
                })->get()->pluck('idphong'))
            ->get();
        if (count($is_valid) == 1) {
            $thue = new Thue([
                'idkhach' => Auth::guard('khachhang')->user()->id,
                'idphong' => $request->get('idphong'),
                'batdau' => $batdau,
                'ketthuc' => $ketthuc,
                'idtrangthai' => 1,
            ]);

            $thue->save();

            return redirect('/account')->with('message', array('status' => 'success', 'content' => 'Bạn đã đặt phòng thành công.'));
        }
        return redirect()->back()->with('message', array('status' => 'danger', 'content' => 'Thông tin bạn cung cấp không chính xác.'));
    }

    public function getContact()
    {
        return view('layouts.home.pages.contact');
    }

    public function getAbout()
    {
        return view('layouts.home.pages.about');
    }

    public function index()
    {
        $rooms = Phong::with('vitri', 'loaiphong')
            ->join('banggias', 'phongs.id', 'banggias.idphong')
            ->whereIn('phongs.id', Banggia::whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d'))->get()->pluck('idphong'))
            ->inRandomOrder()->limit(5)->get();
        return view('layouts.home.pages.home', compact('rooms'));
    }

    public static function increaseCount(){
        if(session()->get('counted') == null){
            $bodem = Bodem::whereDate('ngay', '=', Carbon::now()->format('Y-m-d'))->first();
            if($bodem != null){
                $bodem->soluong ++;
            }
            else{
                $bodem = new Bodem([
                    'ngay' => Carbon::now()->format('Y-m-d'),
                    'soluong' => 1,
                ]);
            }

            $bodem->save();

            session()->put('counted', 'true');

        }
    }

    public function getService(){
        return view('layouts.home.pages.service');
    }
}
