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

        {{--<table class="table table-striped">--}}
            {{--<thead>--}}
              {{--<tr>--}}
                {{--<th>Firstname</th>--}}
                {{--<th>Lastname</th>--}}
                {{--<th>Email</th>--}}
              {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
              {{--<tr>--}}
                {{--<td>John</td>--}}
                {{--<td>Doe</td>--}}
                {{--<td>john@example.com</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}
                {{--<td>Mary</td>--}}
                {{--<td>Moe</td>--}}
                {{--<td>mary@example.com</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}
                {{--<td>July</td>--}}
                {{--<td>Dooley</td>--}}
                {{--<td>july@example.com</td>--}}
              {{--</tr>--}}
            {{--</tbody>--}}
        {{--</table>--}}


    </div>

@endforeach