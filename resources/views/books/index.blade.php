@extends('layouts.app')
@section('content')

<div class="container">
    <h1    style="margin-top: 10px">  @lang('auth.All Books') </h1>
    <a class="btn btn-success" href="{{route('books.create')}}">  @lang('auth.Add Book')</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"> @lang('auth.Name')</th>
            <th scope="col"> @lang('auth.Picture')</th>
             <th scope="col">@lang('auth.Control')</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                {{-- <th scope="row"></th> --}}
                <td>{{ $book->name }}</td>
                {{-- <td>{{ $book->picture }}</td> --}}
                <td><img src="{{asset('upload_books/'.$book->picture)}}" alt=""  style="width: 30%" >  </td>
                <td>
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="@lang('auth.delete')">
                    </form>
                </td>
                {{-- <td>{{ $book->book_pdf }}</td> --}}
                {{-- <td><embed src="{{asset('upload_books/'.$book->book_pdf)}}"  /></td> --}}
                    {{-- <td class="d-flex">
                        <a class="btn btn-info" href="">showpost</a>
                        <a class="btn btn-info" href="">show</a>
                        <a class="btn btn-warning" href="">edit</a>

                        <form method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                    </td> --}}
              </tr>

            @endforeach

        </tbody>
      </table>
</div>
@endsection
