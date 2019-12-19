@extends('layouts.home.layouts.master')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Tài khoản</span>
                    <h2 class="heading">Cập nhật Tài khoản</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <div class="d-flex justify-content-start">
                                    <a title="Quay lại" href="{{ url('/account') }}" class="btn btn-primary">Quay
                                        lại</a>
                                </div>
                            </div>

                            @if($errors->any())
                                <div class="row">
                                    <div class="alert alert-danger col-md-12" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if(session()->get('message') != null)
                                <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert"
                                       aria-label="close">&times;</a>
                                    {{ session()->get('message')['content'] }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                               href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                                                Thông tin cá nhân
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="password-tab" data-toggle="tab"
                                               href="#password" role="tab" aria-controls="password"
                                               aria-selected="false">Mật khẩu</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content ml-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                            <form method="post" action="{{ url('/account/edit') }}">
                                                @csrf
                                                <div class="col-md-8 m-auto">
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">Họ và
                                                            Tên</label>
                                                        <input type="text" name="hoten"
                                                               value="{{ $khachhang->hoten }}"
                                                               class="form-control px-3 py-3" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">Giới tính</label>
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" name="gioitinh" {{ $khachhang->gioitinh == 1 ? 'checked' : '' }} class="px-3 py-3"/>
                                                            Bạn là Nam?
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">Số điện
                                                            thoại</label>
                                                        <input type="text" name="sdt" value="{{ $khachhang->sdt }}"
                                                               class="form-control px-3 py-3" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">
                                                            Ngày sinh</label>
                                                        <input type="text" name="ngaysinh"
                                                               value="{{ \Carbon\Carbon::parse($khachhang->ngaysinh)->format('d/m/Y') }}"
                                                               class="form-control px-3 py-3"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">Địa
                                                            chỉ</label>
                                                        <input type="text" name="diachi"
                                                               value="{{ $khachhang->diachi }}"
                                                               class="form-control px-3 py-3" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-lg-6">
                                                                <label class="col-form-label" style="font-weight:bold;">
                                                                    Tỉnh
                                                                </label>
                                                                <select name="tinh"
                                                                        class="form-control px-3 py-3 select-no-icon">
                                                                    <option value="0">-- Chọn tỉnh --</option>
                                                                    @foreach(\App\Diachi::where('idtinh', '=', null)->get() as $tinh)
                                                                        <option
                                                                            {{ $khachhang->idtinh == $tinh->id ? 'selected' : '' }} value="{{ $tinh->id }}">
                                                                            {{ $tinh->ten }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-12 col-lg-6">
                                                                <label class="col-form-label" style="font-weight:bold;">
                                                                    Thành phố
                                                                </label>
                                                                <select name="thanhpho"
                                                                        class="form-control px-3 py-3 select-no-icon">
                                                                    <option value="0">-- Chọn thành phố --</option>
                                                                    @foreach(\App\Diachi::where('idtinh', '=', $khachhang->idtinh)->where('idtinh', '!=', null)->get() as $thanhpho)
                                                                        <option {{ $khachhang->idthanhpho == $thanhpho->id ? 'selected' : '' }}
                                                                            value="{{ $thanhpho->id }}">{{ $thanhpho->ten }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <button type="submit" name="profile"
                                                                class="btn btn-primary px-3 py-3">
                                                            Cập nhật
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                             aria-labelledby="password-tab">
                                            <form method="post" action="{{ url('/account/edit') }}">
                                                @csrf
                                                <div class="col-md-8 m-auto">
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">
                                                            Mật khẩu cũ
                                                        </label>
                                                        <input type="password" name="matkhau"
                                                               class="form-control px-3 py-3" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">
                                                            Mật khẩu mới
                                                        </label>
                                                        <input type="password" name="matkhaumoi"
                                                               class="form-control px-3 py-3" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label" style="font-weight:bold;">
                                                            Xác nhận Mật khẩu
                                                        </label>
                                                        <input type="password" name="xacnhan"
                                                               class="form-control px-3 py-3" required/>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <button type="submit" name="password"
                                                                class="btn btn-primary px-3 py-3">
                                                            Cập nhật
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
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
            });
        });
    </script>
@endsection

