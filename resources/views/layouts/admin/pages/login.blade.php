<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NewTime Hotel - Đăng nhập</title>
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom-style.css') }}">
    <!--[if lt IE 9]>
    <script src="assets/admin/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Đăng nhập</div>
                <div class="panel-body">
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
                    @if(session()->get('message') != null)
                        <div class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('message')['content'] }}
                        </div>
                    @endif
                    <form role="form" method="post" action="{{ url('admin/login') }}">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tên đăng nhập" name="tendangnhap" type="text"
                                       autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="matkhau" type="password"
                                       required>
                            </div>
                            <div class="form-group">
                                <button name="login" type="submit" class="btn btn-primary login-btn">Đăng nhập</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>

<script src="{{ asset('assets/admin/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>

</body>
</html>
