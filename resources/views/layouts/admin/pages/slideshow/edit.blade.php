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
            <li class="active">Sửa Slideshow</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Slideshow</h1>
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

                        <form role="form" method="post" action="{{ route('slideshow.update', $slideshow->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input name="tieude" autofocus
                                       value="{{ $slideshow->tieude }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input name="mota"
                                       value="{{ $slideshow->mota }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Liên kết</label>
                                <input name="lienket"
                                       value="{{ $slideshow->lienket }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hoạt động</label>
                                <input name="hoatdong"
                                       {{ $slideshow->hoatdong == 1 ? 'checked' : '' }}
                                       type="checkbox" class="checkbox">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input name="urlanh"
                                       type="file" class="custom-file" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a class="btn btn-default" href="{{ route('slideshow.index') }}">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery_3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap_4.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper_1.16.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection
