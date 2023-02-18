<header class="c-header">
    <div class="container container--responsive container--white">
        <div class="c-header__row ">
            <div class="c-header__right">
                <div class="logo">
                    <a href="{{route('index')}}" class="logo__img"></a>
                </div>
                <div class="c-search width-100 ">
                    <form action="{{route('post.search')}}" class="c-search__form position-relative">
                        <input type="text" name="search" class="c-search__input" placeholder="search" value="{{request()->search}}">
                        <button class="c-search__button"><i class="fas fa-search fa-lg search-icon " ></i></button>
                    </form>
                </div>

            </div>
            <div class="c-header__left">
                <div class="c-header__icons">
                    <div class="c-header__button-search "></div>
                    <div class="c-header__button-nav"></div>
                </div>
                @guest
                    <div class="c-button__login-regsiter">
                        <div><a class="c-button__link c-button--register" href="{{route('register')}}"> Sign up</a></div>
                        <div><a class="c-button__link c-button--login" href="{{route('login')}}">Sign in</a></div>
                    </div>
                @else
                    <div class="dropdown-select wide" id="dropdown-user" onclick="dropdownToggle()" tabindex="0" style="width: 180px">
                        <span class="current">{{auth()->user()->name}}</span>
                        <div class="list">
                            <ul>
                                <li class="option" data-value="0" data-display-text="">
                                    <a class="" href="{{route("dashboard")}}">profile</a>
                                </li>
                                <li class="option " data-value="0" data-display-text="" onclick="logoutUser()">Exit</li>
                                <form action="{{route('logout')}}" method="post" id="logout-form">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                @endguest


            </div>
        </div>
    </div>
    <nav class="nav" id="nav">
        <div class="c-button__login-regsiter d-none">
            <div><a class="c-button__link c-button--register" href="{{route('register')}}"> Register</a></div>
            <div><a class="c-button__link c-button--login" href="{{route('login')}}">Login</a></div>
        </div>
        <div class="container container--nav">
            <ul class="nav__ul">
                <li class="nav__item"><a href="{{route('index')}}" class="nav__link">Home</a></li>
                @foreach($categories as $category)
                <li class="nav__item nav__item--has-sub"><a href="{{route('category.show',$category->slug)}}" class="nav__link">{{$category->name}}</a>
                    <div class="nav__sub">
                        <div class="container d-flex item-center flex-wrap container--nav">
                            @foreach($category->children as $childCategory)
                            <a href="{{route('category.show',$childCategory->slug)}}" class="nav__link">{{$childCategory->name}} </a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endforeach

                <li class="nav__item"><a href="#" class="nav__link">About Us</a></li>
                <li class="nav__item"><a href="#" class="nav__link">Contact Us</a></li>
            </ul>
        </div>
    </nav>
</header>
<script>
   function dropdownToggle(){
       $("#dropdown-user").toggleClass("open")
   }
   function logoutUser(){
       document.getElementById('logout-form').submit();
   }
</script>
