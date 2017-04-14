
{{--@if(count($books)>0)--}}

    @foreach($books as $book)

        <div class="row bottom-space equal-height">
            <div class="col-md-4">
                <img class="img-thumbnail" src="{{$book->photo}}">
            </div>

            <div class="list-group col-md-8">
                <a class="list-group-item active" href="{{route('book.show', $book->id)}}">{{$book->title}} {{$book->edition}}th edition</a>
                <div class="list-group-item">{{$book->user->name}}</div>
                <div class="list-group-item">$ {{$book->desirable_price}}</div>
                <div class="list-group-item">{{$book->isbn}}</div>
                <div class="list-group-item">{{$book->statusInWords()}}</div>
            </div>

        </div>

    @endforeach

    {{--@else--}}
        {{--<div class="alert alert-danger">--}}
            {{--No book found--}}
        {{--</div>--}}


{{--@endif--}}