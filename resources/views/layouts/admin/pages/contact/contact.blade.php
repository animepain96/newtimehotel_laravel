@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Tin nhắn</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tin nhắn</h1>
        </div>
    </div><!--/.row-->

    @if(isset($message) && $message != null)
        <div class="alert alert-{{ $message['status'] }} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message['content'] }}
        </div>
    @endif

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding"><em class="fa fa-xl fa-group color-blue"></em>
                        <div class="large">{{ count($tinnhans) }}</div>
                        <div class="text-muted">Tổng cộng</div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách Tin nhắn
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                    <span class="pull-right clickable">
                        <button class="btn btn-primary">Xuất</button>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-lg table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Địa chỉ Email</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tinnhans) > 0)
                                @for($i = 0; $i < count($tinnhans); $i++)
                                    <tr>
                                        <td scope="col">{{ $i+1 }}</td>
                                        <td>{{ $tinnhans[$i]->id }}</td>
                                        <td>{{ $tinnhans[$i]->hoten }}</td>
                                        <td>{{ $tinnhans[$i]->email }}</td>
                                        <td>{{ $tinnhans[$i]->tieude }}</td>
                                        <td>{{ $tinnhans[$i]->noidung }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tinnhans[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tinnhans[$i]->updated_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="#" title="Gửi thư">
                                                Gửi thư
                                            </a>
                                            <form action="{{ route('tinnhan.destroy', $tinnhans[$i]->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn có muốn xóa Tin nhắn này?');" class="btn btn-danger" title="Xóa">
                                                    Xóa
                                                </button>
                                            </form>
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
    </div><!--/.row-->
    <script>
        $('.table').DataTable();
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <link href="{{ asset('assets/admin/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
