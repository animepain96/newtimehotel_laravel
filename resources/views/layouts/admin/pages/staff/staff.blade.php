@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Nhân viên</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nhân viên</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-group color-blue"></em>
                        <div class="large">{{ /*count($nhanviens)*/ $count_NhanVien }}</div>
                        <div class="text-muted">Tổng cộng</div>
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
                    Danh sách Nhân viên
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-primary" href="{{ route('nhanvien.create') }}" title="Thêm mới">Thêm mới</a>
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
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Hoạt động</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                /*
                                @if(count($nhanviens) > 0)
                                    @for($i = 0; $i < count($nhanviens); $i++)
                                        <tr>
                                            <td scope="col">{{ $i+1 }}</td>
                                            <td>{{ $nhanviens[$i]->id }}</td>
                                            <td><img class="img-thumbnail"
                                                     src="{{ asset('/images/staff') }}/{{ $nhanviens[$i]->avatar }}"
                                                     alt="{{ $nhanviens[$i]->hoten }}"></td>
                                            <td>{{ $nhanviens[$i]->tendangnhap }}</td>
                                            <td>{{ $nhanviens[$i]->hoten }}</td>
                                            <td>{{ $nhanviens[$i]->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($nhanviens[$i]->ngaysinh)->format('d/m/Y') }}</td>
                                            <td>{{ $nhanviens[$i]->gioitinh == true ? "Nam" : "Nữ" }}</td>
                                            <td>{{ $nhanviens[$i]->sdt }}</td>
                                            <td>{{ $nhanviens[$i]->diachi }} - {{ $nhanviens[$i]->thanhpho['ten'] }}
                                                - {{ $nhanviens[$i]->tinh['ten'] }}</td>
                                            <td><input type="checkbox"
                                                       {{ $nhanviens[$i]->hoatdong == 1 ? "checked" : "" }} disabled></td>
                                            <td>
                                                @if(!($nhanviens[$i]->tendangnhap == 'admin'))
                                                    <form action="{{ route('nhanvien.destroy', $nhanviens[$i]->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa Nhân viên này?');"
                                                                type="submit">Xóa
                                                        </button>
                                                    </form>
                                                    <a class="btn btn-primary"
                                                       href="{{ route('nhanvien.edit', $nhanviens[$i]->id) }}">Sửa</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                @endif
                                */
                            @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <script>
        let dataTable = $('.table').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, 'desc']],
            ajax: {
                url: '{{route('admin.staff.ajaxGetStaff')}}',
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                },
            },
            columns: [
                {data: null, name: '#'},
                {data: 'id', name: 'nhanviens.id'},
                {data: 'avatar', name: 'avatar'},
                {data: 'tendangnhap', name: 'tendangnhap'},
                {data: 'hoten', name: 'hoten'},
                {data: 'email', name: 'email'},
                {data: 'ngaysinh', name: 'ngaysinh'},
                {data: 'gioitinh', name: 'gioitinh'},
                {data: 'sdt', name: 'sdt'},
                {data: 'diachi', name: 'diachi'},
                {data: 'hoatdong', name: 'hoatdong'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {targets: 0, searchable: false, orderable: false},
                {targets: 2, searchable: false, orderable: false},
                {targets: 11, searchable: false, orderable: false},
            ],
        });
        dataTable.on('draw.dt', function () {
            dataTable.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, index) {
                let info = dataTable.page.info();
                cell.innerHTML = index + 1 + (info.page * info.length);
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
