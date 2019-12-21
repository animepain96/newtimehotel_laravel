@extends('layouts.admin.layouts.master')

@section('title', 'NewTime Hotel - Admin Panel - Thống kê chi tiết')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Thống kê chi tiết</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thống kê chi tiết</h1>
        </div>
    </div><!--/.row-->

    @if(session()->get('message') != null)
        <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message')['content'] }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Doanh thu trong tháng {{ \Carbon\Carbon::now()->month }}
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up">
                        </em>
                    </span>
                    <span id="spanRefreshRevenue" title="Tải lại" class="pull-right refresh-button panel-toggle panel-button-tab-left">
                        <em class="fa fa-refresh">
                        </em>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="revenue"></canvas>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <!--New Reservation-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Phiếu thuê trong tháng {{ \Carbon\Carbon::now()->month }}
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up">
                        </em>
                    </span>
                    <span id="spanRefreshReservation" title="Tải lại" class="pull-right refresh-button panel-toggle panel-button-tab-left">
                        <em class="fa fa-refresh">
                        </em>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="reservation"></canvas>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lượt truy cập trong tháng {{ \Carbon\Carbon::now()->month }}
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span id="spanRefreshView" title="Tải lại" class="pull-right refresh-button panel-toggle panel-button-tab-left">
                        <em class="fa fa-refresh">
                        </em>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="view"></canvas>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    @csrf
    <script>
        $(document).ready(function () {
            LoadViewChart();
            LoadReservationChart();
            LoadRevenueChart();
            document.getElementById('spanRefreshView').addEventListener('click',LoadViewChart);
            document.getElementById('spanRefreshReservation').addEventListener('click',LoadReservationChart);
            document.getElementById('spanRefreshRevenue').addEventListener('click',LoadRevenueChart);
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/ajax/viewchart.js') }}"></script>
    <script src="{{ asset('assets/admin/ajax/reservationchart.js') }}"></script>
    <script src="{{ asset('assets/admin/ajax/revenuechart.js') }}"></script>
@endsection
