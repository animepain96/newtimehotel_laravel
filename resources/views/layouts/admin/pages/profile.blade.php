@extends('layouts.admin.layouts.master)

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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form id="frmProfile" role="form" method="post">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input name="hoten"
                                       value="{{ $nhanvien->hoten }}"
                                       type="text" class="form-control" required disabled>
                                <?php if (isset($name_error) && $name_error != "") echo $name_error; ?>
                            </div>
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input name="tendangnhap"
                                       value="{{ $nhanvien->tendangnhap }}"
                                       type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="add"
                                       value="{{ $nhanvien->email }}"
                                       type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="sdt" value="{{ $nhanvien->sdt }}" type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input name="ngaysinh" value="{{ \Carbon\Carbon::parse($nhanvien->ngaysinh)->format('d/m/Y') }}" type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="form-check-label"><input type="checkbox" class="checkbox" name="gioitinh">Là Nam?</label>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea rows="3" disabled name="diachi">{{ $nhanvien->diachi }}-{{ $nhanvien->thanhpho['ten'] }}-{{ $nhanvien->tinh['ten'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hoạt động</label>
                                <label class="form-check-label"><input type="checkbox" class="checkbox" name="hoatdong">Hoạt động</label>
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <img class="img-avatar-preview" alt="{{ $nhanvien->hoten }}" src="{{ asset('images/staff') }}/{{ $nhanvien->avatar }}">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form id="frmPassword" method="post" role="form">
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input name="newpass" type="password" class="form-control" required validatePassword>
                                <?php if (isset($newpass_error) && $newpass_error != "") echo $newpass_error; ?>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận</label>
                                <input name="cnewpass" type="password" class="form-control" required validatePassword>
                                <?php if (isset($cnewpass_error) && $cnewpass_error != "") echo $cnewpass_error; ?>
                            </div>
                            <button name="pass" type="submit" class="btn btn-primary">Lưu lại</button>
                            <button type="button" onclick="javascript: location.href='index.php';"
                                    class="btn btn-default">Quay lại
                            </button>
                            <?php if (isset($pass_msg) && $pass_msg != "") echo $pass_msg; ?>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ảnh đại diện</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form id="frmAvatar" role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Chọn ảnh</label>
                                <input type="file" name="fileAvatar" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <img class="img-avatar-preview" src="<?php echo $admin_detail['avatar']; ?>"
                                     alt="Ảnh đại diện"/>
                            </div>
                            <button name="image" type="submit" class="btn btn-primary">Lưu lại</button>
                            <button type="button" onclick="javascript: location.href='index.php';"
                                    class="btn btn-default">Quay lại
                            </button>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
@endsection

@section('scripts')

@endsection
