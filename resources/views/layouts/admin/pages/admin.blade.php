@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Trang tổng quan</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Trang tổng quan</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-group color-blue"></em>
                        <div class="large">{{ $summary['khachmoi'] }}</div>
                        <div class="text-muted">Khách hàng mới</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-ticket color-teal"></em>
                        <div class="large">{{ $summary['phieuthuemoi'] }}</div>
                        <div class="text-muted">Phiếu thuê mới</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-money color-orange"></em>
                        <div class="large">{{ number_format($summary['doanhthu']->doanhthu, 0, ',', '.') }}&#8363;</div>
                        <div class="text-muted">Doanh thu</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>

    <!--New Reservation-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Phiếu thuê mới đặt
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Phòng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Bắt đầu</th>
                            <th scope="col">Kết thúc</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i = 0; $i < count($phieuthuemois); $i++)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $phieuthuemois[$i]->id }}</td>
                                <td><b><a title="{{ $phieuthuemois[$i]->khachhang['tendangnhap'] }}" href="{{ route('khachhang.edit', $phieuthuemois[$i]->khachhang['id']) }}">{{ $phieuthuemois[$i]->khachhang['hoten'] }}</a></b></td>
                                <td><b><a title="{{ $phieuthuemois[$i]->phong['tenphong'] }}" href="{{ route('phong.edit', $phieuthuemois[$i]->phong['id']) }}">{{ $phieuthuemois[$i]->phong['tenphong'] }}</a></b></td>
                                <td>{{ \Carbon\Carbon::parse($phieuthuemois[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($phieuthuemois[$i]->batdau)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($phieuthuemois[$i]->ketthuc)->format('d/m/Y') }}</td>
                                <td><a class="btn btn-primary" title="Cập nhật" href="{{ route('thue.edit', $phieuthuemois[$i]->id) }}">Cập nhật</a></td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="fixed-table-pagination">
                        <ul class="pagination">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Phòng cần thêm giá
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên phòng</th>
                            <th scope="col">Loại</th>
                            <th scope="col">Vị trí</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Ngày thêm</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < count($phongthemgias); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $phongthemgias[$i]->id }}</td>
                                    <td><img class="img-thumbnail" alt="{{ $phongthemgias[$i]->tenphong }}" src="{{ asset('images/room') }}/{{ $phongthemgias[$i]->hinhdaidien }}"></td>
                                    <td>{{ $phongthemgias[$i]->tenphong }}</td>
                                    <td>{{ $phongthemgias[$i]->loaiphong['ten'] }}</td>
                                    <td>{{ $phongthemgias[$i]->vitri['ten'] }}</td>
                                    <td>{{ $phongthemgias[$i]->ghichu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phongthemgias[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phongthemgias[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                    <td><a href="{{ url('admin/gia') }}/{{ $phongthemgias[$i]->id }}" title="Đến trang cập nhật Giá" class="btn btn-primary">Cập nhật</a></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="fixed-table-pagination">
                        <ul class="pagination">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <script>
        $('.table').dataTable();
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
