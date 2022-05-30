@extends('layouts.app')
@section('content')
<style>
    .form-group{
        margin-bottom: 10px;!important
    }
</style>
<div class="container">
    <h1 style="margin-top: 10px">Create online session page </h1>
    <form method="POST"  action="{{route('sessions.create')}}">
        <div class="form-group"  >
          <label for="exampleInputEmail1">Session name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
      </form>
    {{-- <a class="btn btn-success" href="{{route('sessions.create')}}">Add </a> --}}

</div>
@endsection
