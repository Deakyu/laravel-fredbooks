@extends('layouts.app')


@section('content')



    <div class="container" id="book-panel">


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

        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading text-center"><strong>Book Lists</strong></div>--}}

            {{--<div class="panel-body">--}}
                @if($books != nullOrEmptyString())
                    @include('book.data')
                @endif
            {{--</div>--}}
        {{--</div>--}}
        <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" alt="">Load</p>
        </div>
    </div>
    <div class="panel" id="testnum" data-num-books="{{$numBooks}}" style="display:none">

    </div>


    <a href="{{route('book.create')}}" class="btn btn-info">Create Book</a>



@stop