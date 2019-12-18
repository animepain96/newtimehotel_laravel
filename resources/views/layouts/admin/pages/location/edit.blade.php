@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('vitri.index') }}" title="Khách hàng">
                    Vị trí
                </a>
            </li>
            <li class="active">Sửa Vị trí</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Vị trí</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">
                    <div class="col-md-6">

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

                        <form role="form" method="post" action="{{ route('vitri.update', $vitri->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Tên vị trí</label>
                                <input name="ten" autofocus
                                       value="{{ $vitri->ten }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea rows="5" name="mota" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a class="btn btn-default" href="{{ route('vitri.index') }}">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery_3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap_4.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper_1.16.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection
