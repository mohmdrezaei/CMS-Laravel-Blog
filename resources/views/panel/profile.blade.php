@extends('layouts.panel')
@section('title')
    - اطلاعات کاربری
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('profile')}}" class="is-active">اطلاعات کاربری</a></li>
        </ul>
    </div>
    <div class="main-content  ">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="{{auth()->user()->getProfileUrl()}}" class="avatar___img">
                        <input type="file" name="profile" accept="image/*" class="hidden avatar-img__input">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">کاربر : {{auth()->user()->name}}</span>
                    @error('profile')
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                </div>
                <input class="text" type="text" name="name" placeholder="نام کاربری" value="{{auth()->user()->name}}">
                @error('name')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <input class="text text-left" type="text" name="phone" placeholder="تلفن همراه" value="{{auth()->user()->phone}}">
                @error('phone')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <input class="text text-left" type="email" name="email" placeholder="ایمیل" value="{{auth()->user()->email}}">
                @error('email')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <input class="text text-left" type="password" name="password" placeholder="رمز عبور">
                @error('password')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <p class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p>
                <br>
                <br>
                <button class="btn btn-webamooz_net">ذخیره تغییرات</button>
            </form>
        </div>

    </div>
@endsection
