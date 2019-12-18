@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lí Giá</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lí Giá - {{ $phong->loaiphong['ten'] }} - {{ $phong->tenphong }}</h1>
        </div>
    </div><!--/.row-->

    @if(isset($message) && $message != null)
        <div class="alert alert-{{ $message['status'] }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message['content'] }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách Giá
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Bắt đầu</th>
                                <th scope="col">Kết thúc</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($banggias) > 0)
                                @for($i = 0; $i < count($banggias); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $banggias[$i]->id }}</td>
                                        <td>{{ number_format($banggias[$i]->gia, 0, 3, ',') }}&#8363;</td>
                                        <td>{{ \Carbon\Carbon::parse($banggias[$i]->batdau)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($banggias[$i]->ketthuc)->format('d/m/Y') }}</td>
                                        <td>{{ $banggias[$i]->ghichu }}</td>
                                        <td>{{ \Carbon\Carbon::parse($banggias[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($banggias[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                               href="{{ url('admin/gia/') }}/{{ $banggias[$i]->idphong }}/delete/{{ $banggias[$i]->id }}">
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thêm Giá
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{ url('admin/gia') }}">
                        @csrf
                        <input type="hidden" name="idphong" value="{{ $phong->id }}">
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" name="gia" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Bắt đầu</label>
                            <input type="text" name="batdau" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kết thúc</label>
                            <input type="text" name="ketthuc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea rows="5" name="ghichu" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-default">Hủy</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <script>
        $('.table').DataTable({
            "lengthMenu": [[5, 10, -1], [5, 10, "All"]]
        });
    </script>

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
    <script src="{{ asset('assets/admin/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection
