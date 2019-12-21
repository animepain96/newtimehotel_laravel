@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Slideshow</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slideshow</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-group color-blue"></em>
                        <div class="large">{{ count($slideshows) }}</div>
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
                    Danh sách Slideshow
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-primary" href="{{ route('slideshow.create') }}" title="Thêm mới">Thêm mới</a>
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
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Liên kết</th>
                                <th scope="col">Hoạt động</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($slideshows) > 0)
                                @for($i = 0; $i < count($slideshows); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $slideshows[$i]->id }}</td>
                                        <td><img class="img-thumbnail" alt="{{ $slideshows[$i]->tieude }}" src="{{ asset('images/slideshow') }}/{{ $slideshows[$i]->urlanh }}" /></td>
                                        <td>{{ $slideshows[$i]->tieude }}</td>
                                        <td>{{ $slideshows[$i]->mota }}</td>
                                        <td>{{ $slideshows[$i]->lienket }}</td>
                                        <td><input type="checkbox" disabled {{ $slideshows[$i]->hoatdong == 1 ? 'checked' : '' }}></td>
                                        <td>{{ $slideshows[$i]->created_at }}</td>
                                        <td>{{ $slideshows[$i]->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('slideshow.destroy', $slideshows[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Slideshow này?');" type="submit">Xóa</button>
                                            </form>
                                            <a class="btn btn-primary" href="{{ route('slideshow.edit', $slideshows[$i]->id) }}">Sửa</a>
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
