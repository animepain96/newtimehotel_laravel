@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Vị trí</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vị trí</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-location-arrow color-blue"></em>
                        <div class="large">{{ count($vitris) }}</div>
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
                    Danh sách Vị trí Phòng
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-primary" href="{{ route('vitri.create') }}" title="Thêm mới">Thêm mới</a>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-lg table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Tên vị trí</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($vitris) > 0)
                                @for($i = 0; $i < count($vitris); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $vitris[$i]->id }}</td>
                                        <td>{{ $vitris[$i]->ten }}</td>
                                        <td>{{ $vitris[$i]->mota }}</td>
                                        <td>{{ $vitris[$i]->created_at }}</td>
                                        <td>{{ $vitris[$i]->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('vitri.destroy', $vitris[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Vị trí này?');" type="submit">Xóa</button>
                                            </form>
                                            <a class="btn btn-primary" href="{{ route('vitri.edit', $vitris[$i]->id) }}">Sửa</a>
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
    <script src="{{ asset('assets/admin/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection
