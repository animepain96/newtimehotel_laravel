@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Đăng kí')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Đăng kí</span>
                    <h2 class="heading">Đăng kí tài khoản</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <h2 class="heading">Đăng kí tài khoản của bạn</h2>
                    <p>Tham gia cùng chúng tôi ngay hôm nay để nhận được những ưu đãi và thông tin hấp dẫn nhất dành
                        riêng
                        cho bạn!</p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5 middle-div">
                    <form method="post" action="{{ url('/register') }}" enctype="multipart/form-data">
                        @if($errors->any())
                            <div class="form-group">
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Tên đăng nhập </label>
                            <input autofocus type="text" required name="tendangnhap" class="form-control px-3 py-3"
                                   placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email </label>
                            <input type="email" required name="email" class="form-control px-3 py-3"
                                   placeholder="Địa chỉ Email">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Họ tên </label>
                            <input type="text" required name="hoten" class="form-control px-3 py-3"
                                   placeholder="Họ tên">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Điện thoại </label>
                            <input type="text" required name="sdt" class="form-control px-3 py-3"
                                   placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Ngày sinh </label>
                            <input type="text" required placeholder="Ngày sinh" name="ngaysinh"
                                   class="form-control px-3 py-3" min="1920-01-01"
                                   max="2009-01-01">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Giới tính </label>
                            <br>
                            <label class="control-label">
                                <input type="checkbox" class="checkbox" name="gioitinh"> Bạn là Nam?
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa chỉ </label>
                            <input type="text" required name="diachi" class="form-control px-3 py-3"
                                   placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <label class="col-form-label">Tỉnh </label>
                                    <select required name="tinh"
                                            class="form-control px-3 py-3">
                                        <option>-- Chọn tỉnh --</option>
                                        @foreach(\App\Diachi::where('idtinh', '=', null)->get() as $tinh)
                                            <option value="{{ $tinh->id }}">{{ $tinh->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <label class="col-form-label">Thành phố </label>
                                    <select required name="thanhpho" class="form-control px-3 py-3">
                                        <option value="0">-- Chọn thành phố --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Ảnh đại diện </label>
                            <input type="file" required name="avatar" class="form-control px-3 py-3" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu </label>
                            <input type="password" required name="matkhau" class="form-control px-3 py-3"
                                   placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Xác nhận Mật khẩu </label>
                            <input type="password" required name="xacnhan" class="form-control px-3 py-3"
                                   placeholder="Xác nhận Mật khẩu">
                        </div>
                        <div class="form-group mt-30px">
                            <input type="submit" value="Đăng kí" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('select[name=tinh]').change(function () {
            let citySelect = $('select[name=thanhpho]');
            citySelect.empty();
            citySelect.append('<option value="0">-- Chọn thành phố --</option>');
            $.ajax({
                url: '/ajax/getcity/' + $('select[name=tinh] option:selected').val(),
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    if (data['status'] === "success") {
                        let citySelect = $('select[name=thanhpho]');
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
        });
    </script>
@endsection
