<?php

namespace App\Http\Controllers;

use App\Bodem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Diachi;
use App\Thue;

class AjaxController extends Controller
{
    public function getCity($idtinh)
    {
        if (is_numeric($idtinh)) {
            return response()->json(['status' => 'success', 'data' => Diachi::where('idtinh', $idtinh)->get()]);
        }
        return response()->json(['status' => 'error', 'message' => 'Not a integer.']);
    }

    public function getView()
    {
        $bodems = Bodem::whereMonth('ngay', '=', Carbon::now()->month)->orderBy('ngay', 'asc')->get();
        if ($bodems != null) {
            $view = array();
            foreach ($bodems as $bodem) {
                $view[] = array('date' => $bodem->ngay, 'total' => $bodem->soluong);
            }
            echo json_encode($view);
        }
    }

    public function getRevenue()
    {
        $doanhthus = Thue::selectRaw('date_format(thues.ketthuc, "%d-%m-%Y") as ngay, sum(datediff(thues.ketthuc,thues.batdau)*gia) as doanhthu')
            ->join('banggias', 'thues.idphong', 'banggias.idphong')
            ->whereMonth('thues.ketthuc', '=', Carbon::now()->month)
            ->where('idtrangthai', '=', 5)
            ->whereRaw('thues.created_at between banggias.batdau and banggias.ketthuc')
            ->groupBy('ngay')
            ->get();
        if($doanhthus != null){
            $revenue = array();
            foreach ($doanhthus as $doanhthu){
                $revenue[] = array('date' => $doanhthu->ngay, 'revenue' => $doanhthu->doanhthu);
            }
            echo json_encode($revenue);
        }
    }

    public function getReservation()
    {
        $data = array();
        $totals = Thue::selectRaw('date_format(created_at, "%d-%m-%Y") as date, count(id) as count')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->groupBy('date')
            ->get();
        if($totals != null){
            foreach ($totals as $total){
                $data['total'][] = $total;
            }
        }

        $cancels = Thue::selectRaw('date_format(created_at, "%d-%m-%Y") as date, count(id) as count')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->where('idtrangthai', '=', 4)
            ->groupBy('date')
            ->get();
        if($cancels != null){
            foreach ($cancels as $cancel){
                $data['cancel'][] = $cancel;
            }
        }

        $successes = Thue::selectRaw('date_format(created_at, "%d-%m-%Y") as date, count(id) as count')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->where('idtrangthai', '=', 5)
            ->groupBy('date')
            ->get();
        if($successes != null){
            foreach ($successes as $success){
                $data['success'][] = $success;
            }
        }

        echo json_encode($data);
    }
}
