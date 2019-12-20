<!doctype html>
<html lang="vi">
<head>
    @include('layouts.home.includes.head')
</head>
<body>
<!--nav bar-->
@include('layouts.home.includes.header')
<!--content-->
@section('content')
@show

<!--footer-->
@include('layouts.home.includes.footer')

@php
\App\Http\Controllers\Home\HomeController::increaseCount();
@endphp

</body>
</html>
