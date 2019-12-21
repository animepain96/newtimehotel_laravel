@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Tìm kiếm nâng cao')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Tìm kiếm</span>
                    <h2 class="heading">Danh sách tìm kiếm</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <h2 class="heading">Tùy chọn tìm kiếm</h2>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="{{ url('/search') }}" method="get" class="search-form-room">
                        <div class="row">
                            <div class="form-group">
                                <label for="">Loại phòng</label>
                                <select name="loaiphong" class="custom-select form-control">
                                    <option value="0">-- Loại phòng --</option>
                                    @foreach(\App\Loaiphong::all() as $loaiphong)
                                        <option value="{{ $loaiphong->id }}" {{ $loaiphong->id == request()->get('loaiphong') ? 'selected' : '' }}>
                                            {{ $loaiphong->ten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Vị trí</label>
                                <select name="vitri" class="custom-select form-control">
                                    <option value="0">-- Vị trí --</option>
                                    @foreach(\App\Vitri::all() as $vitri)
                                        <option value="{{ $vitri->id }}" {{ $vitri->id == request()->get('vitri') ? 'selected' : '' }}>
                                            {{ $vitri->ten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Số người lớn</label>
                                <select name="songuoilon" class="custom-select form-control">
                                    <option value="0">-- Chọn --</option>
                                    @foreach(range(1, 4) as $i)
                                        <option
                                            value="{{ $i }}" {{ $i == request()->get('songuoilon') ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Số trẻ em</label>
                                <select name="sotreem" class="custom-select form-control">
                                    <option selected>-- Chọn --</option>
                                    @foreach(range(0, 4) as $i)
                                        <option
                                            value="{{ $i }}" @if(is_int(request()->get('sotreem')) && request()->get('sotreem') == $i) selected @endif>
                                            {{ $i }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Số giường</label>
                                <select name="sogiuong" class="custom-select form-control">
                                    <option value="0">-- Chọn --</option>
                                    @foreach(range(1, 3) as $i)
                                        <option
                                            value="{{ $i }}" {{ $i == request()->get('sogiuong') ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày bắt đầu</label>
                                <input name="batdau" type="text"
                                       value="{{ request()->get('batdau') != null ? \Carbon\Carbon::createFromFormat('d/m/Y', request()->get('batdau'))->format('d/m/Y') : \Carbon\Carbon::now()->format('d/m/Y') }}"
                                       id="checkin_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày kết thúc</label>
                                <input name="ketthuc" type="text"
                                       value="{{ request()->get('batdau') != null ? \Carbon\Carbon::createFromFormat('d/m/Y', request()->get('ketthuc'))->format('d/m/Y') : \Carbon\Carbon::now()->format('d/m/Y')  }}"
                                       id="checkout_date" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <button name="search" class="btn btn-primary py-3 px-5">Tìm phòng trống</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
            @foreach($rooms as $room)
                <!-- single room -->
                    <div class="col-lg-4 mb-5">
                        <div class="block-34">
                            <div class="image">
                                <a href="{{ url('/room').'/'.$room->id }}">
                                    <img src="{{ asset('/images/room').'/'.$room->hinhdaidien }}" alt="{{ $room->tenphong }}">
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="heading">{{ $room->tenphong }}</h2>
                                <div class="price"><span
                                        class="number">{{ number_format($room->gia, 0, ',', '.') }}</span><sup>&#8363;</sup><sub>/ngày</sub>
                                </div>
                                <ul class="specs">
                                    <li><strong>Số người lớn:</strong> {{ $room->songuoilon }}</li>
                                    <li><strong>Số trẻ em:</strong> {{ $room->sotreem }}</li>
                                    <li><strong>Vị trí:</strong> {{ $room->vitri['ten'] }}</li>
                                    <li><strong>Tiện ích:</strong> {{ $room->tienich }}</li>
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
            {{ $rooms->appends($_GET)->links() }}
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
    <script>
        $(document).ready(function () {
            $('input[name=batdau]').datepicker({
                format: 'dd/mm/yyyy',
            });
            $('input[name=ketthuc]').datepicker({
                format: 'dd/mm/yyyy',
            });
        });
    </script>
@endsection
