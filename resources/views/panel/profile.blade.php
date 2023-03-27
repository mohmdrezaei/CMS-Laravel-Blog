@extends('layouts.panel')
@section('title')
    - User information
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">dashboard</a></li>
            <li><a href="{{route('profile')}}" class="is-active">user information</a></li>
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
                    <span class="profile__name">User : {{auth()->user()->name}}</span>
                    @error('profile')
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                </div>
                <input class="text" type="text" name="name" placeholder="Username" value="{{auth()->user()->name}}">
                @error('name')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <input class="text text-left" type="text" name="phone" placeholder="phone number" value="{{auth()->user()->phone}}">
                @error('phone')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <input class="text text-left" type="email" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                @error('email')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <input class="text " type="password" name="password" placeholder="Password">
                @error('password')
                <p class="alert-error">{{$message}}</p>
                @enderror
                <p class="rules">The password must be at least 6 characters long and a combination of uppercase letters, lowercase letters, numbers, and non-alphabetic characters such as <strong>!@#$%^&*()</strong>.
                <br>
                <br>
                <button class="btn btn-webamooz_net">Save changes</button>
            </form>
        </div>

    </div>
@endsection
