@extends('layouts.home.layouts.master')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ $tin->anhdaidien }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span
                        class="subheading-sm">Ngày đăng: {{ \Carbon\Carbon::parse($tin->created_at)->format('d/m/Y') }} by {{ $tin->nhanvien['hoten'] }}</span>
                    <h2 class="heading">{{ $tin->tieude }}</h2>
                </div>
            </div>
        </div>
    </div>


    <div id="blog" class="site-section">
        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <!-- Post content -->
                    @if($tin == null)
                        <div class="col-12 mb-4">
                            <h2 class="line-height-10 margin-auto">Không tìm thấy bài đăng nào!</h2>
                        </div>
                @else
                    {{ $tin->noidung }}
                @endif
                <!-- End Post content -->

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar">
                    <div class="sidebar-box">
                        <div class="categories">
                            <h3>Danh mục</h3>
                            @foreach(\App\Loaitin::with('tin')->get() as $loaitin)
                                <li><a href="{{ url('/news') }}?cat={{ $loaitin->id }}">{{ $loaitin->ten }}
                                        <span>({{ count($loaitin->tin) }})</span></a></li>
                            @endforeach
                        </div>
                    </div>
                    @if($tin != null)
                        <div class="sidebar-box">
                            <img src="{{ asset('images/staff') }}/{{ $tin->nhanvien['avatar'] }}"
                                 alt="{{ $tin->nhanvien['hoten'] }}" class="img-fluid mb-4 rounded">
                            <h3>{{ $tin->nhanvien['hoten'] }}</h3>
                        </div>
                    @endif
                </div>

            </div>


        </div>
    </div>
@endsection
