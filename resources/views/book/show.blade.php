@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="font-size:2.4rem;"><strong>{{$book->title}}</strong></div>
                <div class="panel-body row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                        <table class="table table-hover text-center">
                            <tr>
                                <td class="active cell-left">Seller</td>
                                <td>{{$book->user->name}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">ISBN</td>
                                <td>{{$book->isbn}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Title</td>
                                <td>{{$book->title}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Author</td>
                                <td>{{$book->author}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Edition</td>
                                <td>{{$book->edition}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Desirable Price</td>
                                <td>$ {{$book->desirable_price}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Status</td>
                                <td>{{$book->statusInWords()}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left" id="photo-text">Photo</td>
                                <td><img height="250" src="{{$book->photo}}"></td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Course</td>
                                <td>{{$book->subject}} {{$book->course}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Course Title</td>
                                <td>{{$book->course_title}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Instructor</td>
                                <td>{{$book->instructor}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Book Dependency</td>
                                <td>{{$book->book_dependancy}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Posted On</td>
                                <td>{{$book->created_at->diffForHumans()}}</td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-2">

                    </div>

                </div>

                @if(Auth::user()->id == $book->user->id)


                <div class="row bottom-space">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-4">
                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-info full-width"><strong>EDIT</strong></a>
                    </div>
                    <div class="col-md-4">
                        {!! Form::open(['method'=>'DELETE', 'action'=>['BookController@destroy', $book->id]]) !!}
                                {!! Form::submit('DELETE', ['class'=>'btn btn-danger full-width strong']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                @endif





            </div>
        </div>
    </div>

@stop