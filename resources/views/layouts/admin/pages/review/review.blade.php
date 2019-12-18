@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Đánh giá</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đánh giá</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-group color-blue"></em>
                        <div class="large">{{ count($danhgias) }}</div>
                        <div class="text-muted">Tổng cộng</div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách Đánh giá của khách hàng
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
                                <th scope="col">Nội dung</th>
                                <th scope="col">Ngày gửi</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($danhgias) > 0)
                                @for($i = 0; $i < count($danhgias); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $danhgias[$i]->id }}</td>
                                        <td title="{{ $danhgias[$i]->khachhang['tendangnhap'] }}">{{ $danhgias[$i]->khachhang['hoten'] }}</td>
                                        <td>{{ $danhgias[$i]->noidung }}</td>
                                        <td>{{ $danhgias[$i]->ngaygui }}</td>
                                        <td>
                                            <form action="{{ route('danhgia.update', $danhgias[$i]->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                @if($danhgias[$i]->hienthi == 1)
                                                    <button type="submit" class="btn btn-success">Hiển thị</button>
                                                @else
                                                    <button type="submit" class="btn btn-secondary">Ẩn</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>{{ $danhgias[$i]->created_at }}</td>
                                        <td>{{ $danhgias[$i]->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('danhgia.destroy', $danhgias[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Đánh giá này?');" type="submit">Xóa</button>
                                            </form>
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
