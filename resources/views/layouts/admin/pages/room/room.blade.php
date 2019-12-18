@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Phòng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phòng</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-group"></em>
                        <div class="large">{{ count($phongs) }}</div>
                        <div class="text-muted">Tổng cộng</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>

    @if(isset($message) && $message != null)
        <div class="alert alert-{{ $message['status'] }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message['content'] }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách Phòng
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-primary" href="{{ route('phong.create') }}" title="Thêm mới">Thêm mới</a>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên phòng</th>
                                <th scope="col">Loại phòng</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Tiện ích</th>
                                <th scope="col">Ngưới lớn</th>
                                <th scope="col">Trẻ em</th>
                                <th scope="col">Diện tích</th>
                                <th scope="col">Số giường</th>
                                <th scope="col">Hoạt động</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($phongs) > 0)
                                @for($i = 0; $i < count($phongs); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $phongs[$i]->id }}</td>
                                        <td><img class="img-thumbnail"
                                                 src="{{ asset('/images/room') }}/{{ $phongs[$i]->hinhdaidien }}"
                                                 alt="{{ $phongs[$i]->tenphong }}"></td>
                                        <td>{{ $phongs[$i]->tenphong }}</td>
                                        <td>{{ $phongs[$i]->loaiphong['ten'] }}</td>
                                        <td>{{ $phongs[$i]->vitri['ten'] }}</td>
                                        <td>{{ $phongs[$i]->tienich }}</td>
                                        <td>{{ $phongs[$i]->songuoilon }}</td>
                                        <td>{{ $phongs[$i]->sotreem }}</td>
                                        <td>{{ $phongs[$i]->dientich }}</td>
                                        <td>{{ $phongs[$i]->sogiuong }}</td>
                                        <td><input type="checkbox" {{ $phongs[$i]->hoatdong == 1 ? "checked" : "" }} disabled></td>
                                        <td>{{ $phongs[$i]->ghichu }}</td>
                                        <td>{{ \Carbon\Carbon::parse($phongs[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($phongs[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <form action="{{ route('phong.destroy', $phongs[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Xóa" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Người dùng này?');" type="submit">Xóa</button>
                                            </form>
                                            <a title="Sửa" class="btn btn-sm btn-primary" href="{{ route('phong.edit', $phongs[$i]->id) }}">Sửa</a>
                                            <a title="Quản lí Giá" class="btn btn-sm btn-warning" href="{{ url('admin/gia') }}/{{ $phongs[$i]->id }}">Giá</a>
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
    <script src="{{ asset('assets/admin/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection
