@extends('layouts.admin.layouts.master')

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}" title="Trang tổng quan">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li>
                <a href="{{ route('phong.index') }}" title="Phòng">
                    Phòng
                </a>
            </li>
            <li class="active">Sửa Phòng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Phòng</h1>
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

                        <form role="form" method="post" action="{{ route('phong.update', $phong->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Tên phòng</label>
                                <input name="tenphong" value="{{ $phong->tenphong }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tiện ích</label>
                                <input name="tienich" value="{{ $phong->tienich }}"
                                       type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số người lớn</label>
                                <input name="songuoilon" value="{{ $phong->songuoilon }}"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số trẻ em</label>
                                <input name="sotreem" value="{{ $phong->sotreem }}"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Diện tích</label>
                                <input name="dientich" value="{{ $phong->dientich }}"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số giường</label>
                                <input name="sogiuong" value="{{ $phong->sogiuong }}"
                                       type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select name="loaiphong" class="form-control">
                                    <option>-- Chọn --</option>
                                    @foreach($loaiphongs as $loaiphong)
                                        <option
                                            {{ $phong->idloai == $loaiphong->id ? 'selected' : '' }} value="{{ $loaiphong->id }}">{{ $loaiphong->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vị trí</label>
                                <select name="vitri" class="form-control">
                                    <option>-- Chọn --</option>
                                    @foreach($vitris as $vitri)
                                        <option
                                            {{ $phong->idvitri == $vitri->id ? 'selected' : '' }} value="{{ $vitri->id }}">{{ $vitri->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label>Hoạt động</label>
                                <div class="checkbox">
                                    <label><input {{ $phong->hoatdong == 1 ? 'checked' : '' }} name="hoatdong"
                                                  type="checkbox">Hoạt động</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="ghichu" rows="5" class="form-control">{{ $phong->noidung }}</textarea>
                            </div>
                            <button name="info" type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('phong.index') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form role="form" method="post" action="{{ route('phong.update', $phong->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <img class="img-avatar-preview"
                                     alt="{{ $phong->loaiphong['ten'] }} - {{ $phong->tenphong }}"
                                     src="{{ asset('images/room') }}/{{ $phong->hinhdaidien }}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input name="hinhdaidien"
                                       type="file" accept="image/*" class="form-control" required>
                            </div>
                            <button name="image" type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('phong.index') }}" class="btn btn-default">Quay lại</a>
                        </form>
                    </div>

                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ảnh mô tả</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            @foreach($phong->anhmota as $anhmota)
                                <form role="form" method="post" action="{{ route('phong.update', $phong->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img class="img-responsive" alt="{{ $phong->tenphong }}"
                                                 src="{{ asset('images/description') }}/{{ $anhmota->urlanh }}">
                                            <input type="hidden" name="des_img" value="{{ $anhmota['id'] }}">
                                            <button title="Xóa" name="delete" class="btn btn-sm btn-danger">
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <form role="form" method="post" action="{{ route('phong.update', $phong->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Ảnh mô tả</label>
                                    <input name="anhmota[]"
                                           type="file" multiple accept="image/*" class="form-control" required>
                                </div>
                                <button name="des_img" type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('phong.index') }}" class="btn btn-default">Quay lại</a>
                            </form>
                        </div>
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
