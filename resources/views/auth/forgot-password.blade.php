@extends("layouts.app")
@section('title')
    - فراموشی رمز عبور
@endsection
@section('content')
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" action="{{route('password.email')}}" method="post">
                    @csrf
                        <input type="text" name="email" class="text text--left" placeholder="شماره یا ایمیل">
                    @error("email")
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    @if(\Illuminate\Support\Facades\Session::has('status'))
                        <p class="alert-success">{{\Illuminate\Support\Facades\Session::get('status')}}</p>
                    @endif
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
