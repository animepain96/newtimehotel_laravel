@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Danh sách Phòng')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/img_1.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Phòng</span>
                    <h2 class="heading">Danh sách Phòng</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row pt-5 justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <a href="{{ url('/search') }}" class="btn btn-primary px-3 py-3">Tìm kiếm nâng cao</a>
                </div>
            </div>

            <div class="row mb-5 pt-5 justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <h2 class="heading">Danh sách Phòng</h2>
                    <p>Danh sách phòng hiện có sẵn cho bạn chọn!</p>
                </div>
            </div>

            <div class="row">

            @foreach($rooms as $room)
                <!-- single room -->
                    <div class="col-lg-4 mb-5">
                        <div class="block-34">
                            <div class="image">
                                <a href="{{ url('/room') }}/{{ $room->id }}">
                                    <img src="{{ asset('/images/room'.'/'.$room->hinhdaidien) }}" alt="{{ $room->tenphong }}"></a>
                            </div>
                            <div class="text">
                                <h2 class="heading">{{ $room->tenphong }}</h2>
                                <div class="price"><span
                                        class="number">{{ $room->gia }}</span><sup>&#8363;</sup><sub>/ngày</sub>
                                </div>
                                <ul class="specs">
                                    <li><strong>Số người lớn:</strong> {{ $room->songuoilon }}</li>
                                    <li><strong>Số trẻ em:</strong> {{ $room->sotreem }}</li>
                                    <li><strong>Vị trí:</strong> {{ $room->vitri['ten'] }}</li>
                                    <li><strong>Tiện ích:</strong> {{ $room->tienich }}
                                    </li>
                                    <li><strong>Diện tích:</strong> {{ $room->dientich }}
                                        m<sup>2</sup></li>
                                    <li><strong>Số giường:</strong> {{ $room->sogiuong }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end single room -->
                @endforeach
            </div>
            {{ $rooms->links() }}
        </div>
    </div>

    <div class="block-22">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="heading mb-4">Đăng kí nhận tin</h2>
                    <div class="subscribe">
                        <form method="post" action="{{ url('/newsletters') }}">
                            @csrf
                            @if(isset($message) && $message != null)
                                <div class="alert alert-{{ $message['status'] }} alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message['content'] }}
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
                            <div class="form-group">
                                <input name="email" type="email" id="email-newsletter" class="form-control email"
                                       placeholder="Nhập địa chỉ Email của bạn" required>
                                <button type="submit"
                                        class="btn btn-primary submit">Đăng kí
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
