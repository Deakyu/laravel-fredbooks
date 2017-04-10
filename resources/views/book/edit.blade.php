@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>c
            <div class="col-md-6">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Edit {{$book->title}}
                        </div>
                        <div class="panel-body">
                            {!! Form::model($book, ['method'=>'PATCH', 'action'=>['BookController@update', $book->id], 'files'=>true, 'class'=>'form-horizontal']) !!}

                            <div class="form-group">
                                {!! Form::label('title', 'Title:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::text('title', $book->title, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('author', 'Author:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::text('author', $book->author, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('isbn', 'ISBN:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::text('isbn', $book->isbn, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('edition', 'Edition:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::number('edition', null, ['class'=>'form-control', 'min'=>0]) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('desirable_price', 'Desirable Price:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::text('desirable_price', $book->desirable_price, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('status', 'Status:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::select('status', [
                            5=>'Very Good',
                            4=>'Good',
                            3=>'Okay',
                            2=>'Bad',
                            1=>'Very Bad'
                        ], $book->status, ['class'=>'form-control', 'placeholder'=>'Pick Status']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('photo', 'Photo:', ['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">{!! Form::file('photo', ['onchange'=>'previewFile()', "class"=>"image-padding-top"]) !!}</div>
                            </div>

                            <div class="form-group text-center">
                                <div class="col-md-12">
                                    <img src="{{$book->photo}}" class="img-thumbnail">
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('subject', 'Subject:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('subject', $book->subject, ['class'=>'form-control', 'placeholder'=>'ex) CSIT']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('course', 'Course:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('course', $book->course, ['class'=>'form-control', 'placeholder'=>'ex) 121']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('course_title', 'Course Title:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('course_title', $book->course_title, ['class'=>'form-control', 'placeholder'=>'ex) Computer Science I']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('instructor', 'Instructor:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('instructor', $book->instructor, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('book_dependancy', 'Book Dependency:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('book_dependancy', $book->book_dependancy, ['class'=>'form-control', 'placeholder'=>'ex) Required for class']) !!}</div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit('Update Book', ['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}


                            <div class="row">
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)

                                                <li style="list-style:none">{{$error}}</li>

                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>

    </div>

@stop