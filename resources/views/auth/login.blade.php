@extends("layouts.app")
@section('title')
    - Sign in
@endsection
@section("content")
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">Sign in</h1>

                <form class="sign-page__form" action="{{route('login.store')}}" method="post">
                    @csrf
                        <input type="text" name="email" class="text text--left" placeholder="Phone Number or Email">
                    @error("email")
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                        <input type="password" name="password" class="text text--left" placeholder="Password">
                    @error("password")
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                        <label class="checkbox text--right">
                            <input type="checkbox" class="checkbox__filter" name="remember">
                            <span class="checkbox__mark position-relative"></span>
                            Remember me
                        </label>
                        <a class="recover-password" href="{{route("password.request")}}">Forgot password?</a>
                        <button class="btn btn--blue btn--shadow-blue width-100 text-center " type="submit">Sign in</button>
                        <div class="sign-page__footer">
                            <span>New to Blog? </span>
                            <a href="{{route("register")}}" class="color--46b2f0 ">Sign up</a>

                        </div>
                </form>
            </div>
        </div>
    </main>
@endsection
