<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title> پنل کاربری@yield('title') </title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/responsive_991.css')}}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{asset('panel/css/responsive_768.css')}}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>
<body>
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"> <i class="fas fa-align-center fa-lg"
                                               style="cursor:pointer; margin-top: 10px"></i></span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="{{auth()->user()->getProfileUrl()}}" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : {{auth()->user()->name}}</span>
        <span class="profile__name">  نقش : {{auth()->user()->getRoleInFarsi()}}</span>
    </div>

    <ul>
        <li class="item-li i-dashboard  "><a
                href="{{route('index')}}"><i class="fab fa-microsoft fa-lg margin-left-10"></i> صفحه اصلی </a></li>
        <li class="item-li i-dashboard @if(request()->is('dashboard')) is-active @endif"><a
                href="{{route('dashboard')}}"><i class="fab fa-microsoft fa-lg margin-left-10"></i> پیشخوان </a></li>
        @if(auth()->user()->role === "admin")
        <li class="item-li i-users @if(request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif">
            <a href="{{route('users.index')}}"><i class="fas fa-user-alt fa-lg margin-left-10"></i> کاربران </a></li>

        <li class="item-li i-categories @if(request()->is('panel/categories') || request()->is('panel/categories/*')) is-active @endif">
            <a href="{{route('categories.index')}}">
                <i class="fas fa-pencil-ruler fa-lg margin-left-10"></i>دسته بندی ها </a></li>
        @endif
        @if(auth()->user()->role === "admin" || auth()->user()->role === "author")
        <li class="item-li i-articles @if(request()->is('panel/posts') || request()->is('panel/posts/*')) is-active @endif"><a href="{{route('posts.index')}}"><i class="fas fa-copy fa-lg margin-left-10"></i>مقالات
            </a></li>
        @endif
        @if(auth()->user()->role === "admin")
        <li class="item-li i-comments @if(request()->is('panel/comments') || request()->is('panel/comments/*')) is-active @endif"><a href="{{route('comments.index')}}"><i class="fas fa-comments fa-lg margin-left-10"></i>
                نظرات </a></li>
        @endif
        <li class="item-li i-user__inforamtion @if(request()->is('profile')) is-active @endif"><a href="{{route('profile')}}"><i
                    class="fas fa-clipboard-list fa-lg margin-left-10"></i>اطلاعات کاربری </a></li>
    </ul>

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"><i class="fas fa-align-center fa-lg" style="cursor:pointer;"></i></span>
            <a class="header__logo" href=""></a>
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <a href="{{route('logout')}}" class="logout" title="خروج"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="fas fa-sign-out-alt fa-lg"></i>
            </a>
            <form action="{{route('logout')}}" method="post" id="logout-form">
                @csrf
            </form>
        </div>
    </div>
    @yield('content')
</div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('status'))
<script>
    Swal.fire({
            title: "{{session('status')}}",
            confirmButtonText: "تایید",
            icon: "success"
        }
    )
</script>
@endif
<script src="{{asset('panel/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('panel/js/js.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
@yield('script')
</html>
