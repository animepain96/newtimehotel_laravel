@extends('layouts.admin.layouts.master')

@section('title', 'NewTime Hotel - Admin Panel - Sửa thông tin')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li class="active">Sửa thông tin cá nhân</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thông tin cá nhân</h1>
        </div>
    </div><!--/.row-->

    @if(session()->get('message') != null)
        <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message')['content'] }}
        </div>
    @endif

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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input name="hoten"
                                       value="{{ $nhanvien->hoten }}"
                                       type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input name="tendangnhap" value="{{ $nhanvien->tendangnhap }}" type="text"
                                       class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="add"
                                       value="{{ $nhanvien->email }}"
                                       type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="sdt" value="{{ $nhanvien->sdt }}" type="text" class="form-control" required
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input name="ngaysinh"
                                       value="{{ \Carbon\Carbon::parse($nhanvien->ngaysinh)->format('d/m/Y') }}"
                                       type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <div class="checkbox">
                                    <label><input {{ $nhanvien->gioitinh == 1 ? 'checked' : '' }} disabled type="checkbox" name="gioitinh">
                                        Bạn là Nam?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea class="form-control" disabled name="diachi">{{ $nhanvien->diachi }}-{{ $nhanvien->thanhpho['ten'] }}-{{ $nhanvien->tinh['ten'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hoạt động</label>
                                <div class="checkbox">
                                    <label><input {{ $nhanvien->hoatdong == 1 ? 'checked' : '' }} disabled type="checkbox" name="hoatdong">
                                        Hoạt động
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="post" role="form" action="{{ url('admin/edit') }}">
                            @csrf
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="matkhau" type="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input name="matkhau" type="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận</label>
                                <input name="xacnhan" type="password" class="form-control" required>
                            </div>
                            <button name="password" type="submit" class="btn btn-primary">Lưu lại</button>
                            <a title="Quay lại" href="{{ route('admin') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ảnh đại diện</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data" action="{{ url('admin/edit') }}">
                            @csrf
                            <div class="form-group">
                                <label>Chọn ảnh</label>
                                <input class="form-control" type="file" name="avatar" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <img class="img-avatar-preview"
                                     src="{{ asset('images/staff').'/'.$nhanvien->avatar }}" alt="Ảnh đại diện"/>
                            </div>
                            <button name="image" type="submit" class="btn btn-primary">Lưu lại</button>
                            <a title="Quay lại" href="{{ route('admin') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!--/.row-->
@endsection

