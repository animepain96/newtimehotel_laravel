@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Liên hệ')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Liên hệ</span>
                    <h2 class="heading">Giữ liên lạc với chúng tôi trong mọi trường hợp</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">

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

                    <form method="post" action="{{ url('/contact') }}">
                        @csrf
                        <div class="form-group">
                            <input autofocus type="text" name="hoten" class="form-control px-3 py-3"
                                   placeholder="Tên bạn" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control px-3 py-3" placeholder="Địa chỉ Email"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="tieude" class="form-control px-3 py-3" placeholder="Tiêu đề"
                                   required>
                        </div>
                        <div class="form-group">
                        <textarea name="noidung" cols="30" rows="7" class="form-control px-3 py-3"
                                  placeholder="Nội dung tin nhắn" required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button name="refresh" type="button" class="btn btn-success">
                                    <i class="oi oi-loop-circular"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <input required type="text" class="form-control px-3 py-3" placeholder="Mã bảo vệ"
                                   name="captcha">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="send" value="Gửi" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6" id="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.3524073189037!2d107.58554931468953!3d16.45768398864193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a147ba6bdbff%3A0x2e605afab4951ad9!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEPDtG5nIG5naGnhu4dwIEh14bq_!5e0!3m2!1svi!2s!4v1576914004452!5m2!1svi!2s"
                        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('button[name=refresh]').click(function () {
                $.ajax({
                    type: 'GET',
                    url: 'refreshcaptcha',
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
        });
    </script>
@endsection
