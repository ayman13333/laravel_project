@extends('layouts.app')
@section('content')
<div class="container">
    <h1 style="margin-top: 10px;margin-bottom: 30px;">Course users page </h1>
    <div class="row">
        @foreach ($courses as $course )
        <div class="card" style="width: 30rem;">
            <img class="card-img-top" src="{{ asset('storage/upload_courses/' . $course->course_picture) }}" alt="Card image cap" style="max-height: 328px;">
            <div class="card-body">
              <h5 class="card-title" style="font-size: x-large">{{$course->course_name}}</h5>
              <p class="card-text" style="font-size: large">Online price: {{$course->price_online}}</p>
              <p class="card-text" style="font-size: large">Offline price: {{$course->price_offline}}</p>
              {{-- <a href="{{route('course.download',$course->id)}}" class="btn btn-danger"> @lang('auth.Buy now') <i class="fas fa-shopping-cart"></i></a> --}}
              <a href="{{ route('buycourseform', [$course->id, $course->course_name]) }}" class="btn btn-danger">
                @lang('auth.Buy now') <i class="fas fa-shopping-cart"></i></a>
            </div>
          </div>

        @endforeach
    </div>
</div>
@endsection
