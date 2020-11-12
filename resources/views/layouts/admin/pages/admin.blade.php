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

    @if(session()->get('message') != null)
        <div class="row">
            <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message')['content'] }}
            </div>
        </div>
    @endif

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
                    <table id="phieu-thue-moi" class="table table-responsive table-hover table-striped">
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
                        @php
                            /*
                            @for($i = 0; $i < count($phieuthuemois); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $phieuthuemois[$i]->id }}</td>
                                    <td><b><a title="{{ $phieuthuemois[$i]->khachhang['tendangnhap'] }}"
                                              href="{{ route('khachhang.edit', $phieuthuemois[$i]->khachhang['id']) }}">{{ $phieuthuemois[$i]->khachhang['hoten'] }}</a></b>
                                    </td>
                                    <td><b><a title="{{ $phieuthuemois[$i]->phong['tenphong'] }}"
                                              href="{{ route('phong.edit', $phieuthuemois[$i]->phong['id']) }}">{{ $phieuthuemois[$i]->phong['tenphong'] }}</a></b>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($phieuthuemois[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phieuthuemois[$i]->batdau)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phieuthuemois[$i]->ketthuc)->format('d/m/Y') }}</td>
                                    <td><a class="btn btn-primary" title="Cập nhật"
                                           href="{{ route('thue.edit', $phieuthuemois[$i]->id) }}">Cập nhật</a></td>
                                </tr>
                            @endfor
                            */
                        @endphp
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
                    <table id="phong-them-gia" class="table table-responsive table-hover table-striped">
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
                        @php
                            /*
                            @for($i = 0; $i < count($phongthemgias); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $phongthemgias[$i]->id }}</td>
                                    <td><img class="img-thumbnail" alt="{{ $phongthemgias[$i]->tenphong }}"
                                             src="{{ asset('images/room') }}/{{ $phongthemgias[$i]->hinhdaidien }}"></td>
                                    <td>{{ $phongthemgias[$i]->tenphong }}</td>
                                    <td>{{ $phongthemgias[$i]->loaiphong['ten'] }}</td>
                                    <td>{{ $phongthemgias[$i]->vitri['ten'] }}</td>
                                    <td>{{ $phongthemgias[$i]->ghichu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phongthemgias[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($phongthemgias[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                    <td><a href="{{ url('admin/gia') }}/{{ $phongthemgias[$i]->id }}"
                                           title="Đến trang cập nhật Giá" class="btn btn-primary">Cập nhật</a></td>
                                </tr>
                            @endfor
                            */
                        @endphp
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
        $(document).ready(function () {
            let phongThemGia = $('#phong-them-gia').DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: '{{route('admin.dashboard.ajaxGetNeedPriceRoom')}}',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                    },
                },
                columns: [
                    {data: null, name: '#'},
                    {data: 'id', name: 'id'},
                    {data: 'hinhdaidien', name: 'hinhdaidien'},
                    {data: 'tenphong', name: 'tenphong'},
                    {data: 'loaiphong.ten', name: 'loaiphong.ten'},
                    {data: 'vitri.ten', name: 'vitri.ten'},
                    {data: 'ghichu', name: 'ghichu'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'},
                ],
                columnDefs: [
                    {targets: 0, searchable: false, orderable: false},
                    {targets: 2, searchable: false, orderable: false},
                    {targets: 9, searchable: false, orderable: false},
                ],
            });

            phongThemGia.on('draw.dt', function () {
                let info = phongThemGia.page.info();
                phongThemGia.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, index) {
                    cell.innerHTML = index + 1 + (info.page * info.length);
                });
            });

            let phieuThueMoi = $('#phieu-thue-moi').DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'desc']],
                ajax: {
                    url: '{{route('admin.dashboard.ajaxGetNewReservation')}}',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                    },
                },
                columns: [
                    {data: null, name: '#'},
                    {data: 'id', name: 'id'},
                    {data: 'khachhang.hoten', name: 'khachhang.hoten'},
                    {data: 'phong.tenphong', name: 'phong.tenphong'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'batdau', name: 'batdau'},
                    {data: 'ketthuc', name: 'ketthuc'},
                    {data: 'action', name: 'action'},
                ],
                columnDefs: [
                    {targets: 0, searchable: false, orderable: false},
                    {targets: 7, searchable: false, orderable: false},
                ],
            });

            phieuThueMoi.on('draw.dt', function () {
                let info = phieuThueMoi.page.info();
                phieuThueMoi.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, index) {
                    cell.innerHTML = index + 1 + (info.page * info.length);
                });
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
