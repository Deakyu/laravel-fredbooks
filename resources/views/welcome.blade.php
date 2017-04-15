@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="jumbotron">
                <h1 class="text-center">Welcome to Fredbooks</h1>
                <p class="text-center">
                    This is a website for people who want to <strong class="bigwords">sell</strong> or <strong class="bigwords">buy</strong>
                    <em>used books</em> on campus!
                </p>
                <p class="text-center">
                    Hope you enjoy!
                </p>
                <p class="text-center"><a class="btn btn-primary btn-lg" href="{{route('book.index')}}" role="button">Get Started</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
