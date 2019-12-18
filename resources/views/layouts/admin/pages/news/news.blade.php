@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Tin tức</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tin tức</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-newspaper-o color-red"></em>
                        <div class="large">{{ count($tins) }}</div>
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
                    Danh sách Tin tức
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-primary" href="{{ route('tin.create') }}" title="Thêm mới">Thêm mới</a>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Nhân viên</th>
                                <th scope="col">Loại tin</th>
                                <th scope="col">Hoạt động</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tins) > 0)
                                @for($i = 0; $i < count($tins); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $tins[$i]->id }}</td>
                                        <td><img alt="{{ $tins[$i]->tieude }}" class="img-thumbnail" src="{{ asset('images/news') }}/{{ $tins[$i]->anhdaidien }}"></td>
                                        <td>{{ $tins[$i]->tieude }}</td>
                                        <td>{{ $tins[$i]->mota }}</td>
                                        <td title="{{ $tins[$i]->nhanvien['tendangnhap'] }}">{{ $tins[$i]->nhanvien['hoten'] }}</td>
                                        <td>{{ $tins[$i]->loaitin['ten'] }}</td>
                                        <td><input type="checkbox" disabled {{ $tins[$i]->hoatdong == 1 ? 'checked' : '' }}></td>
                                        <td>{{ \Carbon\Carbon::parse($tins[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tins[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <form action="{{ route('tin.destroy', $tins[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Tin tức này?');" type="submit">Xóa</button>
                                            </form>
                                            <a class="btn btn-primary" href="{{ route('tin.edit', $tins[$i]->id) }}">Sửa</a>
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
