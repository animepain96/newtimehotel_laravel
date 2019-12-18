@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('nhanvien.index') }}" title="Nhân viên">
                    Nhân viên
                </a>
            </li>
            <li class="active">Thêm Nhân viên</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Nhân viên</h1>
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

                        <form role="form" method="post" action="{{ route('nhanvien.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input name="hoten"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input name="tendangnhap"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="matkhau"
                                       type="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email"
                                       type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="sdt"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input name="ngaysinh" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select name="hoten" class="form-control">
                                    <option>-- Chọn --</option>
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label>Hoạt động</label>
                                <input name="hoatdong" type="checkbox" class="custom-control-input">
                            </div>
                            <div class="form-group">
                                <label>Tỉnh</label>
                                <select name="tinh" class="form-control">
                                    <option>-- Chọn --</option>
                                    @if(!empty($tinhs))
                                        @foreach($tinhs as $tinh)
                                            <option value="{{ $tinh->id }}">{{ $tinh->ten }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thành phố</label>
                                <select name="thanhpho" class="form-control">
                                    <option>-- Chọn --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea name="diachi" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input name="avatar" type="file" accept="image/png, image/jpeg">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('nhanvien.index') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
    <script>
        $('select[name=tinh]').change(function(){
            let citySelect = $('select[name=thanhpho]');
            citySelect.empty();
            citySelect.append('<option value="0">-- Chọn --</option>');
            $.ajax({
                url: '/ajax/getcity/' + $('select[name=tinh] option:selected').val(),
                type: 'get',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    if(data['status'] === "success"){
                        let citySelect = $('select[name=thanhpho]');
                        if(citySelect !== undefined){
                            for(let i = 0; i < data['data'].length; i++){
                                citySelect.append('<option value="' + data['data'][i]['id'] + '">' + data['data'][i]['ten'] + '</option>');
                            }
                        }
                    }
                }
            });
        });
        $('input[name=ngaysinh]').datepicker({
            format: 'dd/mm/yyyy',
        });
    </script>
@endsection

@section('scripts')
@endsection
