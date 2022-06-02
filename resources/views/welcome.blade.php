@extends('layouts.app')
{{-- @include('layouts.side_bar') --}}
@section('content')
    {{-- @yield('content') --}}
    <style>
        .books .carousel-item {
            height: 500px;
        }
        .books .btn-success{
            width: 195px;
        }
        .books .text-center{
            margin-top: 21px;
        }

        .courses .carousel-item {
            height: 600px;
        }
        .courses .btn-success{
            width: 195px;
        }
        .courses .text-center{
            margin-top: 21px;
        }

    </style>


    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                    aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ URL('images/moving/moving14.jpeg') }}" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL('images/moving/moving10.jpeg') }}" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL('images/moving/moving7.jpeg') }}" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL('images/moving/moving1.jpeg') }}" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL('images/moving/moving12.jpeg') }}" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL('images/moving/moving15.jpeg') }}" class="d-block w-100 " alt="...">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h2 style="margin-top: 30px; font-size: xxx-large; font-family: system-ui;"> @lang('auth.about_amr') </h2>
        <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.about_amr_parag')</p>

        <h2 style="margin-top: 30px ;margin-bottom: 30px; font-size: xxx-large; font-family: system-ui;">@lang('auth.books') </h2>

        <div class="books">
            <div id="books" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#books" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#books" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                     <button type="button" data-bs-target="#books" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL('images/books/book1.jpeg') }}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('images/books/book3.jpeg') }}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('images/books/book4.jpeg') }}" class="d-block w-100 " alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#books"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#books"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="text-center">
                <a href="{{route('users.books')}} "   class="btn btn-success"> @lang('auth.buy_book') <i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        <h2 style="margin-top: 30px ;margin-bottom: 30px; font-size: xxx-large; font-family: system-ui;">@lang('auth.courses') </h2>
        <div class="courses">
            <div id="courses" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#courses" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#courses" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#courses" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL('images/courses/course1.jpeg') }}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('images/courses/course2.jpeg') }}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('images/courses/course3.jpeg') }}" class="d-block w-100 " alt="...">
                    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#courses"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#courses"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="text-center">
            <a href=""   class="btn btn-success"> @lang('auth.buy_course') <i class="fas fa-shopping-cart"></i></a>
        </div>
        <h2 style="margin-top: 30px; font-size: xxx-large; font-family: system-ui;">@lang('auth.sessions')</h2>
        <p  style="font-size: xx-large; font-family: system-ui;">@lang('auth.session_parag')</p>
        <ol>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_1') </p> </li>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_2') </p> </li>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_3') </p> </li>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_4') </p> </li>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_5') </p> </li>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_6') </p> </li>
            <li style="font-size: x-large; font-family: system-ui;"> <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.session_7') </p> </li>
        </ol>
        <div class="alert alert-primary" role="alert">
            <p  style="font-size: x-large; font-family: system-ui;">@lang('auth.session_8')</p>
          </div>

        <div class="text-center">
            <a href=""   class="btn btn-success"> @lang('auth.buy_session') <i class="fas fa-shopping-cart"></i></a>
        </div>


    </div>
@endsection
