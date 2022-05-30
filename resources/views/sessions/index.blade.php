@extends('layouts.app')
@section('content')
<div class="container">
    <h1 style="margin-top: 10px">All online Sessions page </h1>
    <a class="btn btn-success" href="{{route('sessions.create')}}">Add new session </a>
    <form   >
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-top: 20px;width:50%">
        <button class="btn btn-success" type="submit" style="margin-top: 10px; ">Search</button>
      </form>


</div>
@endsection
