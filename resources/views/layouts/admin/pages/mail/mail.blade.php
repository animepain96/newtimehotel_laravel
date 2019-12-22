@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Gửi thư</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gửi thư</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chi tiết thư</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        @if(session()->get('message') != null)
                            <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message')['content'] }}
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
                        <form role="form" method="post" action="{{ url('admin/mail') }}">
                            @csrf
                            <div class="form-group">
                                <label>Địa chỉ Email</label>
                                <input name="email" type="email" value="{{ $email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tùy chọn</label>
                                <select name="option" class="form-control">
                                    <option value="0">-- Không --</option>
                                    <option value="1">Danh sách Nhận tin</option>
                                    <option value="2">Danh sách Khách hàng</option>
                                    <option value="3">Danh sách Nhân viên</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input name="subject"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="content" name="content" rows="20" class="form-control"
                                          required></textarea>
                            </div>
                            <button name="send" type="submit" class="btn btn-primary">Gửi thư</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
@endsection
