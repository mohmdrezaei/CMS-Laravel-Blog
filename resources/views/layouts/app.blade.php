<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> blog @yield('title') </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>
<body>
@include('layouts.header')
@yield("content")
@include('layouts.footer')
<div class="overlay"></div>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
@yield('script')
</body>
</html>
