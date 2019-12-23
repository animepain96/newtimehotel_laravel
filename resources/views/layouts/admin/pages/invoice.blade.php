@extends('layouts.admin.layouts.master')

@section('title', 'Chi tiết hóa đơn')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li><a href="{{ route('thue.index') }}" title="Phiếu thuê">
                    Phiếu thuê
                </a>
            </li>
            <li class="active">Xuất hóa đơn</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Xuất hóa đơn</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="container">
                            <div id="invoice">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        NewTime Hotel - Mã số: {{ $thue->id }}
                                        <span
                                            class="pull-right">Ngày xuất: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row mb-3 mt-3">
                                            <div class="col-md-12">
                                                <div>
                                                    Khách hàng: <strong>{{ $thue->khachhang['hoten'] }}</strong>
                                                </div>
                                                <div>
                                                    Email: {{ $thue->khachhang['email'] }}
                                                </div>
                                                <div>
                                                    Điện thoại: {{ $thue->khachhang['sdt'] }}
                                                </div>
                                                <div>
                                                    Địa
                                                    chỉ: {{ $thue->khachhang['diachi'] . ' - ' . $thue->khachhang['tinh']['ten'] . ' - ' .  $thue->khachhang['thanhpho']['ten']}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Phòng</th>
                                                        <th>Giá</th>
                                                        <th>Ngày đặt</th>
                                                        <th>Bắt đầu</th>
                                                        <th>Kết thúc</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $thue->phong['tenphong'] }}</td>
                                                        <td>{{ number_format($thue->gia, 0, ',', '.') }}&#8363;</td>
                                                        <td>{{ \Carbon\Carbon::parse($thue->created_at)->format('d/m/Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($thue->batdau)->format('d/m/Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($thue->ketthuc)->format('d/m/Y') }}</td>
                                                        <td>
                                                            <strong>{{ number_format($thue->tongtien, 0, ',', '.') }}
                                                                &#8363;</strong>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" name="print">In <em
                            class="fa fa-print"></em></button>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->

    <script>
        $(document).ready(function () {
            $('button[name=print]').click(function () {
                let printContents = $('#invoice').html();
                let body = $('body');
                let originalContents = body.html();
                body.html(printContents);
                window.print();
                body.html(originalContents);
            });
        });
    </script>

@endsection
