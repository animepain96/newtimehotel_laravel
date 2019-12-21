<!doctype html>
<html lang="{{ \Illuminate\Support\Facades\App::getLocale() }}">
<head>
    <title>@yield('title')</title>
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
