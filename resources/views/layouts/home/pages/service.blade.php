@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Dịch vụ')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Dịch vụ</span>
                    <h2 class="heading">Dịch vụ và Tiêu chuẩn</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row site-section">
            <div class="col-lg-7 mb-5">
                <img src="{{ asset('assets/home/images/img_7.jpg') }}" alt="Dịch vụ và tiêu chuẩn"
                     class="img-fluid img-shadow">
            </div>
            <div class="col-lg-5 pl-md-5">
                <div class="media block-6">
                    <div class="icon"><span class="ion-ios-checkmark"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Sang trọng</h3>
                        <p>Số lượng lớn phòng sang trọng sẵn sàng phục vụ bạn.</p>
                    </div>
                </div>
                <div class="media block-6">
                    <div class="icon"><span class="ion-ios-checkmark"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Miễn phí Wifi tốc độ cao</h3>
                        <p>Không bỏ lỡ bất kì thông tin nóng nào.</p>
                    </div>
                </div>
                <div class="media block-6">
                    <div class="icon"><span class="ion-ios-checkmark"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Phục vụ 24/7</h3>
                        <p>Dịch vụ phục vụ khách hàng xuyên suốt.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row site-section pt-0">
            <div class="col-lg-7 mb-5 order-lg-2">
                <img src="{{ asset('assets/home/images/img_2.jpg') }}" alt="Image placeholder"
                     class="img-fluid img-shadow">
            </div>
            <div class="col-lg-5 pr-md-5 order-lg-1">

                <div class="media block-6">
                    <div class="icon"><span class="ion-ios-checkmark"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Tối đa tiện nghi</h3>
                        <p>Nội thất và đồ dùng san trọng và hiện đại.</p>
                    </div>
                </div>
                <div class="media block-6">
                    <div class="icon"><span class="ion-ios-checkmark"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Thanh toán tối đa</h3>
                        <p>Chấp nhận thanh toán qua ATM, VISA, Master Card,...</p>
                    </div>
                </div>
                <div class="media block-6">
                    <div class="icon"><span class="ion-ios-checkmark"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Vị trí đắc địa</h3>
                        <p>Khung cảnh nhìn thẳng ra bờ sông Hương vô cùng thơ mộng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
