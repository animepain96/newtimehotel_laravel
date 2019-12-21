@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('khachhang.index') }}" title="Khách hàng">
                    Tài khoản
                </a>
            </li>
            <li class="active">Sửa tài khoản</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa tài khoản</h1>
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

                        <form role="form" method="post" action="{{ route('khachhang.update', $khachhang->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input name="hoten"
                                       value="{{ $khachhang->hoten }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="matkhau"
                                       type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email"
                                       value="{{ $khachhang->email }}"
                                       type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="sdt"
                                       value="{{ $khachhang->sdt }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input name="ngaysinh"
                                       value="{{ Carbon\Carbon::parse($khachhang->ngaysinh)->format('d/m/Y') }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select name="gioitinh" class="form-control">
                                    <option>-- Chọn --</option>
                                    <option {{ $khachhang->gioitinh == 1 ? 'selected' : '' }} value="nam">Nam</option>
                                    <option {{ $khachhang->gioitinh == 0 ? 'selected' : '' }} value="nu">Nữ</option>
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label>Kích hoạt</label>
                                <input name="kichhoat" {{ $khachhang->kichhoat == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input">
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label>Hoạt động</label>
                                <input name="hoatdong" {{ $khachhang->hoatdong == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input">
                            </div>
                            <div class="form-group">
                                <label>Tỉnh</label>
                                <select name="tinh" class="form-control">
                                    <option>-- Chọn tỉnh --</option>
                                    @if(($tinhs = App\Diachi::where('idtinh', null)->get()) != null)
                                        @foreach($tinhs as $tinh)
                                            <option {{ $khachhang->idtinh == $tinh->id ? 'selected' : '' }} value="{{ $tinh->id }}">{{ $tinh->ten }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thành phố</label>
                                <select name="thanhpho" class="form-control">
                                    <option>-- Chọn thành phố --</option>
                                    @if($khachhang->idtinh != null && ($thanhphos = App\Diachi::where('idtinh', '=', $khachhang->idtinh)->get()) != null)
                                        @foreach($thanhphos as $thanhpho)
                                            <option {{ $khachhang->idthanhpho == $thanhpho->id ? 'selected' : '' }} value="{{ $thanhpho->id }}">{{ $thanhpho->ten }}</option>
                                        @endforeach
                                    @endif
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
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a class="btn btn-default" href="{{ route('khachhang.index') }}">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
    <script>
        $(document).ready(function() {
            $('select[name=tinh]').change(function () {
                let citySelect = $('select[name=thanhpho]');
                citySelect.empty();
                citySelect.append('<option value="0">-- Chọn --</option>');
                $.ajax({
                    url: '/ajax/getcity/' + $('select[name=tinh] option:selected').val(),
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        if (data['status'] === "success") {

                            if (citySelect !== undefined) {
                                for (let i = 0; i < data['data'].length; i++) {
                                    citySelect.append('<option value="' + data['data'][i]['id'] + '">' + data['data'][i]['ten'] + '</option>');
                                }
                            }
                        }
                    }
                });
            });

            $('input[name=ngaysinh]').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '2010-01-01'
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery_3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap_4.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper_1.16.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection
