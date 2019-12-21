<!DOCTYPE html>
<html lang="{{ \Illuminate\Support\Facades\App::getLocale() }}">
<head>
    <title>@yield('title')</title>
    @include('layouts.admin.includes.head')
    @section('scripts')
    @show
</head>
<body>

<!--menu-->
@include('layouts.admin.includes.header')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <!--content-->
    @section('content')
    @show
</div>    <!--/.main-->

@include('layouts.admin.includes.footer')

</body>
</html>
