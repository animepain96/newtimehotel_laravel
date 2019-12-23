@extends('layouts.home.layouts.master')

@section('title')
    NewTime Hotel - {{ $phong->tenphong }}
@endsection

@section('content')
    <div class="block-30 block-30-sm item"
         style="background-image: url('{{ asset('images/room').'/'.$phong->hinhdaidien }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">{{ $phong->loaiphong['ten'] }}</span>
                    <h2 class="heading">{{ $phong->tenphong }}</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="block-22">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <h2 class="heading">Chi tiết phòng</h2>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-34">
                        <div class="text">
                            <h2 class="heading">{{ $phong->tenphong }}</h2>
                            <div class="price"><span
                                    class="number">{{ number_format($phong->gia, 0, ',', '.') }}</span><sup>&#8363;</sup><sub>/ngày</sub>
                            </div>
                            <ul class="specs">
                                <li><strong>Số người lớn:</strong> {{ $phong->songuoilon }}</li>
                                <li><strong>Số trẻ em:</strong> {{ $phong->sotreem }}</li>
                                <li><strong>Vị trí:</strong> {{ $phong->vitri['ten'] }}</li>
                                <li><strong>Tiện ích:</strong> {{ $phong->tienich }}</li>
                                <li><strong>Diện tích:</strong> {{ $phong->dientich }}
                                    m<sup>2</sup></li>
                                <li><strong>Số giường:</strong> {{ $phong->sogiuong }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="owl-carousel loop-block-35">
                @foreach($phong->anhmota as $anhmota)
                    <!-- single item -->
                        <div class="block-35 item"
                             data-stellar-background-ratio="0.5">
                            <img alt="{{ $phong->tenphong }}" src="{{ asset('images/description').'/'.$anhmota->urlanh }}"
                                 class="img-fluid">
                        </div>
                        <!-- end single item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="block-22">
        <div class="container">
            <div class="row align-content-center text-center justify-content-center">
                <div class="col-lg-6 booking-detail">
                    <h2>Thời gian đã đặt</h2>
                    @foreach($thues as $thue)
                        <span><i class="icon icon-ticket"></i>
                            {{ \Carbon\Carbon::parse($thue->batdau)->format('d/m/Y') }}
                            -
                            {{ \Carbon\Carbon::parse($thue->ketthuc)->format('d/m/Y') }}
                        </span>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <h2>Bạn đặt phòng</h2>
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
                    <form method="post" action="{{ url('room/reservation') }}">
                        @csrf
                        <input type="hidden" name="idphong" value="{{ $phong->id }}">
                        <div class="form-group">
                            <input type="text" name="batdau" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="ketthuc" class="form-control" required>
                        </div>
                        <button class="btn btn-primary px-3 py-3">Đặt phòng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('input[name=batdau], input[name=ketthuc]').datepicker({
                'format': 'dd/mm/yyyy',
                'autoclose': true,
            });
        });
    </script>
@endsection
