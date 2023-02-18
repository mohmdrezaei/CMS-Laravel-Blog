@extends("layouts.app")
@section('title')
    - بازیاب رمز عبور
@endsection
@section('content')
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="text" name="email" class="text text--left" placeholder="شماره یا ایمیل" value="{{old('email', $request->email)}}">
                    @error("email")
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <input type="password" name="password" class="text text--left" placeholder="رمز عبور جدید" >
                    @error("email")
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <input type="password" name="password_confirmation" class="text text--left" placeholder="تایید رمز عبور" >
                    @error("email")
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <button class="btn btn--blue btn--shadow-blue width-100 ">بازیابی</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{route('register')}}" class="color--46b2f0">صفحه ثبت نام</a>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
