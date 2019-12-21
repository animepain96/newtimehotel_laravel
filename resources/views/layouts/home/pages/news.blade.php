@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Tin tức')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Tin tức</span>
                    <h2 class="heading">Tin tức và Sự kiện</h2>
                </div>
            </div>
        </div>
    </div>


    <div class=" site-section bg-light" id="blog">

        <div class="container">

            <div class="row mb-1">
                <div class="col-md-5 mb-5">
                    <div class="c-categories">
                        <h3>Danh mục tin</h3>
                        @foreach(\App\Loaitin::with('tin')->get() as $loaitin)
                            <li><a href="?cat={{ $loaitin->id }}">{{ $loaitin->ten }}
                                    <span>({{ count($loaitin->tin) }})</span></a></li>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
            @if(request()->query('cat') != null)
                @php
                    $tins = \App\Tin::with('nhanvien')->where('idloaitin', '=', request()->query('cat'))->orderBy('id', 'desc')->paginate(10);
                @endphp
            @else
                @php
                    $tins = \App\Tin::with('nhanvien')->orderBy('id', 'desc')->paginate(10);
                @endphp
            @endif
            @foreach($tins as $tin)
                <!--single post -->
                    <div class="col-md-12 mb-4">
                        <div class="block-3 d-md-flex">
                            <a class="image" href="{{ url('news/') }}/{{ $tin->id }}"
                               style="background-image: url('{{ asset('images/news').'/'.$tin->anhdaidien }}'); "></a>
                            <div class="text">
                                <h2 class="heading"><a
                                        href="{{ url('news/') }}/{{ $tin->id }}">{{ $tin->tieude }}</a>
                                </h2>
                                <p class="meta">
                                    <em>Ngày đăng</em>
                                    <a>{{ $tin->created_at }}</a>
                                    <span class="sep">&bullet;</span>
                                    <em>by</em>
                                    <a>{{ $tin->nhanvien['hoten'] }}</a>
                                </p>
                                <p>{{ $tin->mota }}</p>
                                <p><a href="{{ url('news/') }}/{{ $tin->id }}">Xem thêm ...</a></p>
                            </div>
                        </div>
                    </div>
                <!-- end single post -->
            @endforeach
                {{ $tins->appends($_GET)->links() }}
            </div>
        </div>
    </div>
@endsection
