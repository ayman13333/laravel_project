{{-- {{Request::segment(1)}} --}}
<!doctype html>
{{-- dir="ltr" --}}
{{-- str_replace('_', '-', app()->getLocale()) --}}
@if (app()->getLocale() == 'ar')
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}" dir="ltl">
@endif
{{-- {{app()->getLocale()}} --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('AmrAli.com', 'AmrAli.com') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @if (LaravelLocalization::getCurrentLocale() == 'en')
                <a class="navbar-brand" href="{{ url('/en') }}" title="@lang('auth.home')">
                    <img src="{{ URL('images/logo_e.jpeg') }}" style="width: 106px;">
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/') }}" title="@lang('auth.home')">
                    <img src="{{ URL('images/logo_e.jpeg') }}" style="width: 106px;">
                </a>
            @endif
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Courses</a>
                                <a class="dropdown-item" href="#">Books</a>
                                <a class="dropdown-item" href="#">Videos</a>
                                <a class="dropdown-item" href="#">Session</a>
                        </li> --}}
                    </ul>

                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        {{-- <li class="nav-item active"> <a href="https://wa.me/1019633445" target="_blank" class="nav-link">+20</a> </li> --}}
                        {{-- <li class="nav-item active"> <p class="nav-link"> <i class="fa-solid fa-phone"></i> +201019633445</p> </li> --}}
                        <li class="nav-item active"> <a href="{{ route('users.books') }} " class="nav-link" title="@lang('auth.buy_book')">
                                @lang('auth.my_books')</a> </li>
                        <li class="nav-item active"> <a href="{{ route('allcourses') }}" class="nav-link" title="@lang('auth.buy_course')"> @lang('auth.my_courses')</a> </li>
                        <li class="nav-item active">
                            <a href="" target="" class="nav-link"  title="@lang('auth.buy_session')">@lang('auth.my_sessions')</a> </li>
                        <li class="nav-item active"> <a href="{{route('videos')}}" target="" class="nav-link" title="@lang('auth.enjoy our videos now')">
                                @lang('auth.Videos')</a> </li>
                        <li class="nav-item active"> <a href="https://www.facebook.com/Yatafakron/" target="_blank"
                            title="@lang("auth.Yatafakron·Education")" class="nav-link">@lang('auth.about_us') </a> </li>



                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/login') }}">
                                        @lang('auth.login')
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/register') }}">
                                        @lang('auth.register')
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @if (Auth::user()->rule_id == 1)
                                        <a class="dropdown-item" href="{{ route('books.index') }}">
                                            <strong>Books Admin page</strong>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('clients.index') }}">
                                            <strong>All Clients Admin page</strong>
                                        </a>
                                        {{-- for session page --}}
                                        {{-- <a class="dropdown-item" href="{{route('sessions.index')}}">
                                            <strong>online Session Admin page</strong>
                                        </a> --}}
                                        <a class="dropdown-item" href="{{route('courses.index')}}">
                                            <strong>online Courses Admin page</strong>
                                        </a>
                                        {{-- {{route('sessions.index')}} --}}
                                    @endif
                                    {{-- route('logout') --}}
                                    {{-- LaravelLocalization::localizeUrl('logout') --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li class="nav-item">
                            {{-- <a href="http://instagram.com/drmoury" target="_blank" title="instagram"> <i
                                    class="fa-brands fa-instagram fa-2x"></i></a>
                            <a href="https://t.me/s/dramrali" target="_blank" title="Telegram"> <i
                                    class="fa-brands fa-telegram fa-2x"></i></a>
                            <a href="http://youtube.com/amrali" target="_blank" title="you tube"> <i
                                    class="fa-brands fa-youtube fa-2x"></i></a>
                            <a href="http://fb.com/zbarovia" target="_blank" title="facebook"> <i
                                    class="fa-brands fa-facebook fa-2x"></i> </a> --}}
                                    <div>
                                        <a href="http://instagram.com/drmoury" target="_blank" title="instagram"> <i
                                                class="fa-brands fa-instagram fa-2x"> |</i></a>
                                        <a href="https://t.me/s/dramrali" target="_blank" title="Telegram"> <i
                                                class="fa-brands fa-telegram fa-2x"> |</i></a>
                                        <a href="http://youtube.com/amrali" target="_blank" title="you tube"> <i
                                                class="fa-brands fa-youtube fa-2x"> |</i></a>
                                        <a href="http://fb.com/zbarovia" target="_blank" title="facebook"> <i
                                                class="fa-brands fa-facebook fa-2x"> </i>
                                        </a>
                                        {{-- <p style="font-size: large;" class="text-center">visit us now</p> --}}
                                    </div>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                                @endif
                            @endforeach
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ app()->getLocale() == 'ar' ? 'Arabic' : 'English' }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="{{url('en')}}"> English</a>
                              <a class="dropdown-item" href="{{url('ar')}}">Arabic</a> --}}
                                <a class="dropdown-item"
                                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                    English</a>
                                <a class="dropdown-item"
                                    href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">Arabic</a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
<footer>
    <style>
        footer a{
            padding: 5px;
        }
    </style>
    {{-- <div class="container"> --}}
        <hr>
        <div>
            <a href="http://instagram.com/drmoury" target="_blank" title="instagram"> <i
                    class="fa-brands fa-instagram fa-2x"> |</i></a>
            <a href="https://t.me/s/dramrali" target="_blank" title="Telegram"> <i
                    class="fa-brands fa-telegram fa-2x"> |</i></a>
            <a href="http://youtube.com/amrali" target="_blank" title="you tube"> <i
                    class="fa-brands fa-youtube fa-2x"> |</i></a>
            <a href="http://fb.com/zbarovia" target="_blank" title="facebook"> <i
                    class="fa-brands fa-facebook fa-2x"> </i>
            </a>
            <p style="font-size: large;">@lang('auth.Follow us now to recieve all new')</p>
            {{-- <p style="background-color: blue;color:aliceblue">Follow Us  now to receive all new</p> --}}
            {{-- <p  class="text-center">All rights reserved to Amr Ali</p> --}}
            <div class="alert alert-secondary" role="alert" >
                <p class="text-center">@lang('auth.All rights reserved to Amr Ali') </p>
              </div>

        </div>
    {{-- </div> --}}

</footer>

</html>
