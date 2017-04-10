@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">Book Information</div>
                        <div class="panel-body">
                            {!! Form::open(['method'=>'POST', 'action'=>'BookController@store', 'files'=>true, 'class'=>'form-horizontal', 'id'=>'book-create-form']) !!}

                            <div class="form-group">
                                {!! Form::label('title', 'Title:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('title', null, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('author', 'Author:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('author', null, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('isbn', 'ISBN:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('isbn', null, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('edition', 'Edition:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::number('edition', null, ['class'=>'form-control', 'min'=>0]) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('desirable_price', 'Desirable Price:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('desirable_price', null, ['class'=>'form-control', 'placeholder'=>'Do not put letters']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('status', 'Status:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::select('status', [
                            5=>'Very Good',
                            4=>'Good',
                            3=>'Okay',
                            2=>'Bad',
                            1=>'Very Bad'
                        ], null, ['class'=>'form-control', 'placeholder'=>'Pick Status']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('photo', 'Photo:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::file('photo', ['onchange'=>'previewFile()', "class"=>"image-padding-top"]) !!}</div>
                            </div>

                            <div class="form-group text-center">
                                <div class="col-sm-12">
                                    <img src="{{$defaultPicPath}}" class="img-thumbnail">
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('subject', 'Subject:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'ex) CSIT']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('course', 'Course:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('course', null, ['class'=>'form-control', 'placeholder'=>'ex) 121']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('course_title', 'Course Title:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('course_title', null, ['class'=>'form-control', 'placeholder'=>'ex) Computer Science I']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('instructor', 'Instructor:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('instructor', null, ['class'=>'form-control']) !!}</div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('book_dependancy', 'Book Dependancy:', ['class'=>'col-sm-4 control-label']) !!}
                                <div class="col-sm-6">{!! Form::text('book_dependancy', null, ['class'=>'form-control', 'placeholder'=>'ex) Used a lot']) !!}</div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4">
                                    {!! Form::submit('Register Book', ['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">

            </div>
        </div>
    </div>



    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif

@endsection




@section('scripts')

    <script>
        var priceInput = $('#desirable_price');

        priceInput.keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });
    </script>


@stop