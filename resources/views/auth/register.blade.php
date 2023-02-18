@extends("layouts.app")
@section('title')
    - Sign up
@endsection
@section("content")
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">Sign up</h1>
                <form action="{{route('register.store')}}" class="sign-page__form" method="post">
                    @csrf
                    <input type="text" name="name" class="text text--left @error("name") alert-error @enderror"
                           placeholder="Full Name" value="{{ old('name') }}">
                    @error("name")
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <input type="text" name="phone" class="text text--left " placeholder="Phone Number">
                    @error("phone")
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <input type="text" name="email" class="text text--left " placeholder="Email">
                    @error("email")
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <input type="password" name="password" class="text text--left " placeholder="Password">
                    @error("password")
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="password" name="password_confirmation" class="text text--left"
                           placeholder="password confirmation">


                    <button class="btn btn--blue btn--shadow-blue width-100 mb-10 text-center">Sign up</button>
                    <div class="sign-page__footer">
                        <span>Already have an account?</span>
                        <a href="{{route('login')}}" class="color--46b2f0"> Sign in</a>

                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
