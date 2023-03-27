@extends('layouts.panel')
@section('title')
    - dashboard
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="dashboard">dashboard</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
            <div class="col-3 padding-20  border-radius-3 bg-white  margin-bottom-10">
                <p  style="font-weight: bold">Posts count</p>
                <p>{{$posts_count}} post</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10" st>
                <p style="font-weight: bold">Comments count</p>
                <p>{{$comments_count}} comment</p>
            </div>
            @endif
            @if(auth()->user()->role === 'admin')
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p style="font-weight: bold"> Users count </p>
                <p>{{$users_count}} person</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10  margin-bottom-10">
                <p style="font-weight: bold">Categories count</p>
                <p>{{$categories_count}} category </p>
            </div>
            @endif
        </div>

    </div>
@endsection
