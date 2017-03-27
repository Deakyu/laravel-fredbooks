@extends('layouts.app')


@section('content')

    <ul>
        @foreach($books as $book)

            <div class="image-container">
                <img height="100px" src="{{$book->photo}}" alt="">
            </div>

            <li><a href="{{route('book.show', $book->id)}}">{{$book->title}}</a></li>

        @endforeach
    </ul>

@stop