<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">NewTime Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Danh mục
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ url('/room') }}" class="nav-link">Phòng</a></li>
                <li class="nav-item"><a href="{{ url('/service') }}" class="nav-link">Dịch vụ</a></li>
                <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">Về chúng tôi</a></li>
                <li class="nav-item"><a href="{{ url('/news') }}" class="nav-link">Tin tức</a></li>
                <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Liên hệ</a></li>
                @if(\Illuminate\Support\Facades\Auth::guard('khachhang')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="account.php">Tài khoản</a>
                            <a class="dropdown-item" href="send_review.php">Đánh giá</a>
                            <a class="dropdown-item" href="login.php?act=logout">Thoát</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Đăng nhập</a></li>
                    <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Đăng kí</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
