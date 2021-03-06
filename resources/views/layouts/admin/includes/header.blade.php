<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse"><span class="sr-only">Danh mục</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ route('admin') }}"><span>NewTime</span> Hotel</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img
                src="{{ asset('images/staff') }}/{{ \Illuminate\Support\Facades\Auth::guard('nhanvien')->user()->avatar }}"
                class="img-responsive" alt="{{ \Illuminate\Support\Facades\Auth::guard('nhanvien')->user()->hoten }}">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><a href="{{ url('admin/edit') }}" title="Sửa thông tin cá nhân">
                    {{ \Illuminate\Support\Facades\Auth::guard('nhanvien')->user()->hoten }}
                    <em class="fa fa-edit"></em>
                </a>
            </div>
            <div
                class="profile-usertitle-status">{{ \Illuminate\Support\Facades\Auth::guard('nhanvien')->user()->isAdmin == 1 ? 'Quản trị Website' : 'Nhân viên' }}</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li><a href="{{ route('admin') }}"><em
                    class="fa fa-dashboard">&nbsp;</em> Trang tổng quan</a></li>
        <li>
            <a href="{{ route('thue.index') }}"><em class="fa fa-calendar">&nbsp;</em> Phiếu thuê</a></li>
        <li class="parent">
            <a data-toggle="collapse" href="#room">
                <em class="fa fa-hotel">&nbsp;</em> Phòng <span data-toggle="collapse" href="#room"
                                                                class="icon pull-right"><em
                        class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="room">
                <li><a href="{{ route('phong.create') }}">
                        <span class="fa fa-plus">&nbsp;</span> Thêm mới
                    </a></li>
                <li><a href="{{ route('phong.index') }}">
                        <span class="fa fa-navicon">&nbsp;</span> Quản lí
                    </a></li>
                <li><a href="{{ route('loaiphong.index') }}">
                        <span class="fa fa-folder">&nbsp;</span> Loại phòng
                    </a></li>
                <li><a href="{{ route('vitri.index') }}">
                        <span class="fa fa-map">&nbsp;</span> Vị trí
                    </a></li>
            </ul>
        </li>
        <li class="parent">
            <a data-toggle="collapse" href="#account">
                <em class="fa fa-group">&nbsp;</em> Tài khoản
                <span data-toggle="collapse" href="#account" class="icon pull-right">
                <em class="fa fa-plus"></em>
            </span>
            </a>
            <ul class="children collapse" id="account">
                <li><a class="" href="{{ route('nhanvien.index') }}">
                        <span class="fa fa-key">&nbsp;</span> Nhân viên
                    </a>
                </li>
                <li><a class="" href="{{ route('khachhang.index') }}">
                        <span class="fa fa-group">&nbsp;</span> Khách hàng
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent">
            <a data-toggle="collapse" href="#tool">
                <em class="fa fa-anchor">&nbsp;</em> Tiện ích
                <span data-toggle="collapse" href="#tool" class="icon pull-right">
                <em class="fa fa-plus"></em>
            </span>
            </a>
            <ul class="children collapse" id="tool">
                <li><a class="" href="{{ route('nhantin.index') }}">
                        <span class="fa fa-newspaper-o">&nbsp;</span> Nhận tin
                    </a>
                </li>
                <li><a class="" href="{{ route('tinnhan.index') }}">
                        <span class="fa fa-comments">&nbsp;</span> Tin nhắn
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="{{ url('admin/thongke') }}"><em
                    class="fa fa-area-chart">&nbsp;</em> Thống kê</a></li>
        <li><a href="{{ url('admin/danhgia') }}"><em
                    class="fa fa-comment">&nbsp;</em> Đánh giá</a></li>
        <li>
            <a href="{{ route('slideshow.index') }}"><em class="fa fa-picture-o">&nbsp;</em> Slideshow</a></li>
        <li class="parent">
            <a data-toggle="collapse" href="#blog">
                <em class="fa fa-newspaper-o">&nbsp;</em> Tin tức <span data-toggle="collapse" href="#blog"
                                                                        class="icon pull-right"><em
                        class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="blog">
                <li><a class="" href="{{ route('tin.create') }}">
                        <span class="fa fa-plus">&nbsp;</span> Thêm mới
                    </a></li>
                <li><a class="" href="{{ route('tin.index') }}">
                        <span class="fa fa-navicon">&nbsp;</span> Tin tức
                    </a></li>
                <li><a class="" href="{{ route('loaitin.index') }}">
                        <span class="fa fa-folder">&nbsp;</span> Thể loại
                    </a></li>
            </ul>
        </li>
        <li><a href="{{ url('/admin/mail') }}"><em
                    class="fa fa-mail-forward">&nbsp;</em> Gửi thư</a></li>
        <li><a href="{{ url('admin/logout') }}"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
    </ul>
</div><!--/.sidebar-->
