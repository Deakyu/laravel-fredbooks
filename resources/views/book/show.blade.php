@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="font-size:2.4rem;">Details</div>
                <div class="panel-body row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-8">
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
                                <td class="active cell-left">Desirable Price</td>
                                <td>{{$book->desirable_price}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left">Status</td>
                                <td>{{$book->status}}</td>
                            </tr>
                            <tr>
                                <td class="active cell-left" id="photo-text">Photo</td>
                                <td><img height="250" src="{{$book->photo}}"></td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-sm-2">

                    </div>

                </div>
                <div class="row bottom-space">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-info full-width"><strong>EDIT</strong></a>
                    </div>
                    <div class="col-sm-4">
                        {!! Form::open(['method'=>'DELETE', 'action'=>['BookController@destroy', $book->id]]) !!}
                                {!! Form::submit('DELETE', ['class'=>'btn btn-danger full-width strong']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-sm-2">

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop