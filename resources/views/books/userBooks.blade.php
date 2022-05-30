@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 style="margin-top: 10px"> @lang('auth.Books') </h1>
        <hr>
        <div class="row">
            @foreach ($books as $book)
                <div class="card" style="width: 30rem;">
                    <img class="card-img-top" src="{{ asset('upload_books/' . $book->picture) }}" alt="Card image cap" style="max-height: 328px;">
                    <div class="card-body">

                        @if ($book->name == 'خرائط القران الكريم')
                            <h3 class="card-title">{{ $book->name }}</h3>
                            <p class="card-text" style="font-size: x-large">

                            <div class="alert alert-success" role="alert">
                                <p style="font-size: x-large; font-family: system-ui;"> @lang('auth.free') </p>
                            </div>
                            </p>
                            <a href="{{ route('buybooksform', [$book->id, $book->name]) }}" class="btn btn-success">
                                @lang('auth.download') <i class="fas fa-shopping-cart"></i></a>
                            {{-- <a href="{{route('book.download',$book->id)}}" class="btn btn-success" style="margin-bottom: 10px">@lang('auth.download') <i class="fas fa-shopping-cart"></i></a> --}}
                        @else
                            <h3 class="card-title">{{ $book->name }}</h3>
                            <p class="card-text" style="font-size: x-large">@lang('auth.price : 1$')</p>
                            <ul>
                                <li style="font-size: large">@lang('auth.pdf')</li>
                                <li style="font-size: large">@lang('auth.hard')</li>
                                <li style="font-size: large">@lang('auth.hard o') </li>
                            </ul>

                            <a href="{{ route('buybooksform', [$book->id, $book->name]) }}" class="btn btn-danger">
                                @lang('auth.Buy now') <i class="fas fa-shopping-cart"></i></a>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>
        @if (LaravelLocalization::getCurrentLocale() == 'en')
            <a  href="{{ url('/en') }}" class="btn btn-primary"  style="margin-top: 10px;margin-left: 31%;" >Back to Home page</a>
        @else
            <a  href="{{ url('/') }}" class="btn btn-primary"  style="margin-top: 10px;margin-right: 31%;">الرجوع للصفحة الرئيسية</a>
        @endif

    </div>
@endsection
