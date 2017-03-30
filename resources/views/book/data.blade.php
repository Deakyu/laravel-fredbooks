@foreach($books as $book)

    <div class="row bottom-space equal-height">
        <div class="col-sm-4">
            <img class="img-thumbnail" src="{{$book->photo}}">
        </div>

        <div class="list-group col-sm-8">
            <a class="list-group-item active" href="{{route('book.show', $book->id)}}">{{$book->title}}</a>
            <div class="list-group-item">{{$book->user->name}}</div>
            <div class="list-group-item">$ {{$book->desirable_price}}</div>
            <div class="list-group-item">{{$book->isbn}}</div>
            <div class="list-group-item">{{$book->statusInWords()}}</div>
        </div>
    </div>

@endforeach