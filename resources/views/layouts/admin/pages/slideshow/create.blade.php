@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('slideshow.index') }}" title="Slideshow">
                    Slideshow
                </a>
            </li>
            <li class="active">Thêm Slideshow</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Slideshow</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">
                    <div class="col-md-6">

                        @if($errors->any())
                            <div class="row">
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form role="form" method="post" action="{{ route('slideshow.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input name="tieude" autofocus
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input name="mota"
                                       type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Liên kết</label>
                                <input name="lienket"
                                          type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hoạt động</label>
                                <input name="hoatdong"
                                          type="checkbox" class="checkbox">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input name="urlanh"
                                          type="file" class="custom-file" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('slideshow.index') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
@endsection

@section('scripts')
@endsection
