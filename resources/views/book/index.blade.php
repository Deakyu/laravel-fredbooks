@extends('layouts.app')


@section('content')



    <div class="container">


        @if(Session::has('deleted_book'))

            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{session('deleted_book')}}</strong>
            </div>

        @endif

        @if(Session::has('updated_book'))

            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{session('updated_book')}}</strong>
            </div>

        @endif

        @if(Session::has('created_book'))

            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{session('created_book')}}</strong>
            </div>

        @endif

        <div class="panel panel-default">
            <div class="panel-heading text-center"><strong>Book Lists</strong></div>

            <div class="panel-body">
                @if($books != nullOrEmptyString())
                    @foreach($books as $book)
                        <div class="row bottom-space">
                            <div class="col-sm-4">
                                <img class="img-thumbnail" src="{{$book->photo}}">
                            </div>

                            <div class="list-group col-sm-8">
                                <a class="list-group-item active" href="{{route('book.show', $book->id)}}">{{$book->title}}</a>
                                <div class="list-group-item">{{$book->user->name}}</div>
                                <div class="list-group-item">$ {{$book->desirable_price}}</div>
                                <div class="list-group-item">{{$book->isbn}}</div>
                                <div class="list-group-item">{{$book->status}}</div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
        </div>

            <a href="{{route('book.create')}}" class="btn btn-info">Create Book</a>
    </div>





@stop