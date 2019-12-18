@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('thue.index') }}" title="Phiếu thuê">
                    Phiếu thuê
                </a>
            </li>
            <li class="active">Sửa Phiếu thuê</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Phiếu thuê</h1>
        </div>
    </div><!--/.row-->

    @if(isset($message) && $message != null)
        <div class="alert alert-{{ $message['status'] }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message['content'] }}
        </div>
    @endif

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

                        <form role="form" method="post" action="{{ route('thue.update', $thue->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Khách hàng</label>
                                <input
                                       value="{{ $thue->khachhang['hoten'] }}"
                                       type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Phòng</label>
                                <input name="idphong" type="hidden" value="{{ $thue->phong['id'] }}">
                                <input
                                    value="{{ $thue->phong['tenphong'] }}"
                                    type="text" class="form-control" required disabled>
                            </div>
                            <div class="form-group">
                                <ul>
                                    @foreach($dangthues as $dangthue)
                                        <li>{{ \Carbon\Carbon::parse($dangthue->batdau)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($dangthue->ketthuc)->format('d/m/Y') }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group">
                                <label>Bắt đầu</label>
                                <input name="batdau"
                                    value="{{ \Carbon\Carbon::parse($thue->batdau)->format('d/m/Y') }}"
                                    type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kết thúc</label>
                                <input
                                    name="ketthuc"
                                    value="{{ \Carbon\Carbon::parse($thue->ketthuc)->format('d/m/Y') }}"
                                    type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái thuê</label>
                                <select name="trangthaithue" class="form-control">
                                    @foreach(\App\Trangthaithue::all() as $trangthaithue)
                                        <option {{ $thue->trangthaithue['id'] == $trangthaithue->id ? 'selected' : '' }} value="{{ $trangthaithue->id }}">{{ $trangthaithue->mota }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea
                                    name="ghichu" rows="5"
                                    value="{{ $thue->ghichu }}" class="form-control">{{ $thue->ghichu }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a class="btn btn-default" href="{{ route('thue.index') }}">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
    <script>
        $('input[name=batdau]').datepicker({
            format: 'dd/mm/yyyy'
        });
        $('input[name=ketthuc]').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>
@endsection

@section('scripts')
@endsection
