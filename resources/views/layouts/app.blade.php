@php
    use App\Book;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fredbooks</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link  href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,bold" rel="stylesheet" type="text/css" >
    <link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css" >

    @yield('styles')

    <style>
        .fa-btn {
            margin-right: 6px;
        }

    </style>
    <script src="https://use.fontawesome.com/ef1792dc46.js"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a id="nav-brand" class="navbar-brand" href="{{ url('/home') }}">
                    <i class="fa fa-book" aria-hidden="true" style="margin-right: 5px;"></i>Fredbooks
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ route('book.index') }}">Books <span class="badge">{{count(Book::all())}}</span></a></li>
                </ul>

                {{--<form class="navbar-form navbar-left">--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="form-control" placeholder="Search">--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-default">Search</button>--}}


                {{--</form>--}}
                {!! Form::open(['method'=>'POST', 'action'=>'BookController@search', 'class'=>'navbar-form navbar-left']) !!}

                <div class="form-group">
                    {!! Form::select('search_param', [
                        'title'=>'Title',
                        'isbn'=>'ISBN',
                        'author'=>'Author',
                        'subject'=>'Subject',
                        'course'=>'Course',
                        'course_title'=>'Course Title',
                        'instructor'=>'Instructor',
                    ], null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::text('search_text', null, ['class'=>'form-control', 'placeholder'=>'search']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Search', ['class'=>'btn btn-default']) !!}
                </div>

            {!! Form::close() !!}

                <!-- Right Side Of Navbar -->
                <ul id="nav-right" class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{asset('js/libs.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>
