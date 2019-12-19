
<footer class="footer">
    <div class="container">
        <div class="row mb-5">
            <!-- Info -->
            <div class="col-md-6 col-lg-4">
                <h3 class="heading-section">Về chúng tôi</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse
                    veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore
                    accusantium tempore dolores sunt.</p>
                <p><a href="{{ url('/about') }}" class="btn btn-primary px-4">Xem thêm</a></p>
            </div>
            <!-- News -->
            <div class="col-md-6 col-lg-4">
                <h3 class="heading-section">Tin tức</h3>
                @foreach(\App\Tin::with('nhanvien')->orderBy('updated_at', 'desc')->limit(4)->get() as $tinmoi)
                    <div class="block-21 d-flex mb-4">
                        <figure class="mr-3">
                            <img src="{{ $tinmoi->anhdaidien }}" alt="{{ $tinmoi->tieude }}" class="img-fluid">
                        </figure>
                        <div class="text">
                            <h3 class="heading"><a href="#">{{ $tinmoi->tieude }}</a></h3>
                            <div class="meta">
                                <div><a><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($tinmoi->updated_at)->format('d/m/Y') }}</a></div>
                                <div><a><span class="icon-person"></span> {{ $tinmoi->nhanvien['hoten'] }}</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Contact info -->
            <div class="col-md-6 col-lg-4">
                <div class="block-23">
                    <h3 class="heading-section">Thông tin liên hệ</h3>
                    <ul>
                        <li><a><span class="icon icon-map-marker"></span><span class="text">70 Nguyễn Huệ</span></a>
                        </li>
                        <li><a><span class="icon icon-phone"></span><span
                                    class="text">+84 123 456 789</span></a></li>
                        <li><a href="mailto:info@newtimehotel.com"><span class="icon icon-envelope"></span><span
                                    class="text">info@newtimehotel.com</span></a></li>
                        <li><a><span class="icon icon-clock-o"></span><span class="text">Thứ 2 - Chủ nhật 8:00 - 23:00</span></a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="row pt-5">
            <div class="col-md-12 text-left">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> -
                    All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>

<script src="{{ asset('assets/home/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/home/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/home/js/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('assets/home/js/aos.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.animateNumber.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('assets/home/js/google-map.js') }}"></script>
<script src="{{ asset('assets/home/js/main.js') }}"></script>

@section('scripts')
@show
