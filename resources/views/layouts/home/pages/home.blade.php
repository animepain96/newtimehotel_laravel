@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Mang đến cho bạn trải nghiệm hoàn toàn mới')

@section('content')
    <!-- Slider -->
    <div class="block-31" style="position: relative;">
        <div class="owl-carousel loop-block-31 ">
        @foreach(\App\Slideshow::where('hoatdong', '=', 1)->get() as $slideshow)
            <!-- single item -->
                <div class="block-30 item" style="background-image: url('{{ asset('images/slideshow').'/'.$slideshow->urlanh }}');"
                     data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <span class="subheading-sm">{{ $slideshow->tieude }}</span>
                                <h2 class="heading">{{ $slideshow->mota }}</h2>
                                <p><a href="{{ $slideshow->lienket }}" class="btn py-4 px-5 btn-primary"
                                      target="_blank">Xem thêm</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single item -->
            @endforeach
        </div>
    </div>
    <!-- End Slider -->

    <!-- Content -->

    <div class="container">
        <!-- Check available roon -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="block-32">
                    <form action="{{ url('/search') }}" method="get">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label>Ngày đến</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input name="batdau" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                    <label>Ngày đi</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input name="ketthuc" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label>Số người lớn</label>
                                        <div class="field-icon-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="songuoilon" class="form-control">
                                                <option value="0">-- Chọn --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label>Số trẻ em</label>
                                        <div class="field-icon-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="sotreem" class="form-control">
                                                <option>-- Chọn --</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 align-self-end">
                                <button class="btn btn-primary btn-block">Tìm phòng trống</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Services-->
        <div class="row site-section">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-7 section-heading">
                        <span class="subheading-sm">Dịch vụ</span>
                        <h2 class="heading">Dịch vụ và Tiện nghi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured room -->
    <div class="site-section block-13 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 section-heading">
                    <span class="subheading-sm">Phòng nổi bật</span>
                    <h2 class="heading">Phòng</h2>
                    <p>Danh sách những phòng nổi bật nhất, có giá cả phải chăng, được khách hàng yêu thích lựa chọn và
                        đánh
                        giá tích cực.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                </div> <!-- .col-md-12 -->
            </div>
        </div>
    </div>


    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 class="heading">Chất lượng dịch vụ hàng đầu phục vụ nhu cầu của bạn</h2>
                    <p><a href="{{ url('/service') }}" class="btn py-4 px-5 btn-primary">Xem thêm</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 section-heading">
                    <span class="subheading-sm">Đánh giá</span>
                    <h2 class="heading">Khách hàng đánh giá</h2>
                </div>
            </div>
            <div class="row">
            @foreach(\App\Danhgia::with('khachhang')->where('hienthi', '=', 1)->orderBy('created_at', 'desc')->limit(3)->get() as $danhgia)
                <!-- single review -->
                    <div class="col-md-6 col-lg-4">

                        <div class="block-33">
                            <div class="vcard d-flex mb-3">
                                <div class="image align-self-center">
                                    <img src="{{ asset('images/customer') }}/{{ $danhgia->khachhang['avatar'] }}"
                                         alt="{{ $danhgia->khachhang['hoten'] }}">
                                </div>
                                <div class="name-text align-self-center">
                                    <h2 class="heading">{{ $danhgia->khachhang['hoten'] }}</h2>
                                    <span class="meta">Khách hàng</span>
                                </div>
                            </div>
                            <div class="text">
                                <blockquote>
                                    <p>&ldquo; {{ $danhgia->noidung }} &ldquo;</p>
                                </blockquote>
                            </div>
                        </div>

                    </div>
                    <!-- end single review -->
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('input[name=batdau], input[name=ketthuc]').datepicker({
                format: 'dd/mm/yyyy',
            });
        });
    </script>
@endsection
