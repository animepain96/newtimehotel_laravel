@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Đánh giá')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Đánh giá</span>
                    <h2 class="heading">Gửi đánh giá</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center section-heading">
                    <h2 class="heading">Đánh giá</h2>
                    <p>Đánh giá dịch vụ và chất lượng phục vụ!</p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-8 pr-md-5 middle-div">
                    @if(session()->get('message') != null)
                        <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('message')['content'] }}
                        </div>
                    @endif
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
                    <form method="post" action="{{url('/review')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Đánh giá </label>
                            <textarea name="noidung" placeholder="Đánh giá của bạn" required class="form-control"
                                      rows="10"></textarea>
                        </div>
                        <div class="form-group mt-30px">
                            <button type="submit" class="btn btn-primary py-3 px-5">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
