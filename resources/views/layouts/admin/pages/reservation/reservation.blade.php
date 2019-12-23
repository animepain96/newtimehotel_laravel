@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Phiếu thuê</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phiếu thuê</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-bar-chart-o color-blue"></em>
                        <div class="large">{{ count($thues) }}</div>
                        <div class="text-muted">Tổng cộng</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-money color-teal"></em>
                        <div class="large">{{ $summary['dathanhtoan'] }}</div>
                        <div class="text-muted">Đã thanh toán</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-key color-green"></em>
                        <div class="large">{{ $summary['nhanphong'] }}</div>
                        <div class="text-muted">Nhận phòng</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-check color-orange"></em>
                        <div class="large">{{ $summary['xacnhan'] }}</div>
                        <div class="text-muted">Xác nhận</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-ticket color-red"></em>
                        <div class="large">{{ $summary['datphong'] }}</div>
                        <div class="text-muted">Đặt phòng</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-close color-gray"></em>
                        <div class="large">{{ $summary['huy'] }}</div>
                        <div class="text-muted">Hủy</div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->
    </div>

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
                    Danh sách Phiếu thuê
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-lg table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Phòng</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Bắt đầu</th>
                                <th scope="col">Kết thúc</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($thues) > 0)
                                @for($i = 0; $i < count($thues); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $thues[$i]->id }}</td>
                                        <td>
                                            <b>
                                                <a title="{{ $thues[$i]->khachhang['tendangnhap'] }}" href="{{ route('khachhang.edit', $thues[$i]->khachhang['id']) }}">
                                                    {{ $thues[$i]->khachhang['hoten'] }}
                                                </a>
                                            </b>
                                        </td>
                                        <td>
                                            <b>
                                                <a title="{{ $thues[$i]->phong['tenphong'] }}" href="{{ route('phong.edit', $thues[$i]->phong['id']) }}">
                                                    {{ $thues[$i]->phong['tenphong'] }}
                                                </a>
                                            </b>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($thues[$i]->ngaydat)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($thues[$i]->batdau)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($thues[$i]->ketthuc)->format('d/m/Y') }}</td>
                                        <td>{{ $thues[$i]->trangthaithue['mota'] }}</td>
                                        <td>{{ $thues[$i]->ghichu }}</td>
                                        <td>{{ \Carbon\Carbon::parse($thues[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <form action="{{ route('thue.destroy', $thues[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Xóa" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Phiếu thuê này?');" type="submit">Xóa</button>
                                            </form>
                                            <a title="Sửa" class="btn btn-primary" href="{{ route('thue.edit', $thues[$i]->id) }}">Sửa</a>
                                            @if($thues[$i]->idtrangthai == 5)
                                                <a title="Hóa đơn" class="btn btn-warning" href="{{ url('admin/invoice').'/'.$thues[$i]->id }}">Hóa đơn</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <script>
        $('.table').DataTable();
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
