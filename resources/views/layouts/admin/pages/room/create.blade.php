@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('phong.index') }}" title="Phòng">
                    Phòng
                </a>
            </li>
            <li class="active">Thêm Phòng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Phòng</h1>
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

                        <form role="form" method="post" action="{{ route('phong.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên phòng</label>
                                <input name="tenphong"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tiện ích</label>
                                <input name="tienich"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số người lớn</label>
                                <input name="songuoilon"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số trẻ em</label>
                                <input name="sotreem"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Diện tích</label>
                                <input name="dientich"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số giường</label>
                                <input name="sogiuong"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select name="loaiphong" class="form-control">
                                    <option>-- Chọn --</option>
                                    @foreach($loaiphongs as $loaiphong)
                                        <option value="{{ $loaiphong->id }}">{{ $loaiphong->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vị trí</label>
                                <select name="vitri" class="form-control">
                                    <option>-- Chọn --</option>
                                    @foreach($vitris as $vitri)
                                        <option value="{{ $vitri->id }}">{{ $vitri->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label>Hoạt động</label>
                                <div class="checkbox">
                                    <label><input name="hoatdong" type="checkbox">Hoạt động</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="ghichu" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh hiển thị</label>
                                <input name="hinhdaidien" type="file" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Ảnh mô tả (Nhiều ảnh)</label>
                                <input name="anhmota[]" type="file" multiple accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('phong.index') }}" class="btn btn-default">Quay lại</a>
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
