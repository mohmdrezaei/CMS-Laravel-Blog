@extends('layouts.panel')
@section('title')
- ایجاد کاربر جدید
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a href="{{route('users.create')}}" class="is-active">ایجاد کاربر جدید</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ایجاد کاربر جدید</p>
                <form action="{{route('users.store')}}" class="padding-30" method="post">
                    @csrf
                    <input type="text" name="name" class="text" placeholder="نام و نام خانوادگی">
                    @error('name')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="email" name="email" class="text" placeholder="ایمیل">
                    @error('email')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="text" name="phone" class="text" placeholder="شماره موبایل">
                    @error('phone')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <select name="role" class="select">
                        <option value="user" selected>کاربر عادی</option>
                        <option value="author">نویسنده</option>
                        <option value="admin">مدیر</option>
                    </select>
                    @error('role')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">ایجاد</button>
                </form>

            </div>
        </div>
    </div>
@endsection
