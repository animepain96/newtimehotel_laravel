@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('tin.index') }}" title="Tin tức">
                    Tin tức
                </a>
            </li>
            <li class="active">Thêm Tin tức</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Tin tức</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">
                    <div class="col-md-12">

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

                        <form role="form" method="post" action="{{ route('tin.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input name="tieude"
                                               type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="mota" rows="4" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Loại tin</label>
                                        <select name="loaitin" class="form-control">
                                            <option>-- Chọn --</option>
                                            @if(isset($loaitins))
                                                @foreach($loaitins as $loaitin)
                                                    <option value="{{ $loaitin->id }}">{{ $loaitin->ten }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hoạt động</label>
                                        <input name="hoatdong"
                                               type="checkbox">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <input name="anhdaidien" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea name="noidung" rows="8"
                                                  class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('tin.index') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
    <script>
        CKEDITOR.replace('noidung');
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
@endsection
