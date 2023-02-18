@extends('layouts.panel')
@section('title')
    - ویرایش کاربر
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a href="{{route('users.edit',$user->id)}}" class="is-active">ویرایش کاربران</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر</p>
                <form action="{{route('users.update',$user->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="text" name="name" placeholder="نام و نام خانوادگی" value="{{$user->name}}">
                    @error('name')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="email" class="text" name="email" placeholder="ایمیل" value="{{$user->email}}">
                    @error('email')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="text" class="text" name="phone" placeholder="شماره موبایل" value="{{$user->phone}}">
                    @error('phone')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <select name="role" class="select">
                        <option value="user" @if($user->role === 'user') selected @endif>کاربر عادی</option>
                        <option value="author" @if($user->role === 'author') selected @endif>نویسنده</option>
                        <option value="admin" @if($user->role === 'admin') selected @endif>مدیر</option>
                    </select>
                    @error('role')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">ویرایش</button>
                </form>

            </div>
        </div>
    </div>
@endsection
