@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Khách hàng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Khách hàng</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-group color-blue"></em>
                        <div class="large">{{ count($khachhangs) }}</div>
                        <div class="text-muted">Tổng cộng</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-user-plus color-orange"></em>
                        <div class="large">{{ count($khachhangs) }}</div>
                        <div class="text-muted">Mới trong tháng</div>
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
                    Danh sách tài khoản
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-primary" href="{{ route('khachhang.create') }}" title="Thêm mới">Thêm mới</a>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-lg table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Hoạt động</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($khachhangs) > 0)
                                @for($i = 0; $i < count($khachhangs); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $khachhangs[$i]->id }}</td>
                                        <td><img class="img-thumbnail"
                                                 src="{{ asset('/images/customer') }}/{{ $khachhangs[$i]->avatar }}"
                                                 alt="{{ $khachhangs[$i]->hoten }}"></td>
                                        <td>{{ $khachhangs[$i]->tendangnhap }}</td>
                                        <td>{{ $khachhangs[$i]->hoten }}</td>
                                        <td>{{ $khachhangs[$i]->email }}</td>
                                        <td>{{ $khachhangs[$i]->ngaysinh }}</td>
                                        <td>{{ $khachhangs[$i]->gioitinh == true ? "Nam" : "Nữ" }}</td>
                                        <td>{{ $khachhangs[$i]->sdt }}</td>
                                        <td>{{ $khachhangs[$i]->diachi }} - {{ $khachhangs[$i]->thanhpho['ten'] }} - {{ $khachhangs[$i]->tinh['ten'] }}</td>
                                        <td><input type="checkbox" {{ $khachhangs[$i]->kichhoat == 1 ? "checked" : "" }} disabled></td>
                                        <td><input type="checkbox" {{ $khachhangs[$i]->hoatdong == 1 ? "checked" : "" }} disabled></td>
                                        <td>
                                            <form action="{{ route('khachhang.destroy', $khachhangs[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Người dùng này?');" type="submit">Xóa</button>
                                            </form>
                                            <a class="btn btn-primary" href="{{ route('khachhang.edit', $khachhangs[$i]->id) }}">Sửa</a>
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
    @if(isset($message))
        <div class="alert alert-{{$message['status']}} alert-dismissible fade show" role="alert">
            {{ $message['content'] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
