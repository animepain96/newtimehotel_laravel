@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Đăng nhập')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Đăng nhập</span>
                    <h2 class="heading">Đăng nhập hệ thống</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <h2 class="heading">Đăng nhập hệ thống</h2>
                    <p>Sử dụng tài khoản đã đăng kí để đăng nhập Website!</p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5 middle-div">
                    <form method="post" action="{{ url('/login') }}">
                        @if(session()->get('message') != null)
                            <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message')['content'] }}
                            </div>
                        @endif
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
                            <input type="text" name="tendangnhap" class="form-control px-3 py-3"
                                   placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu </label>
                            <input type="password" name="matkhau" class="form-control px-3 py-3"
                                   placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group mt-30px">
                            <input type="submit" value="Đăng nhập"
                                   class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
