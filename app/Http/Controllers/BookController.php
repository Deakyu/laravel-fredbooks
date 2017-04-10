<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookEditRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function customAjax(Request $request) {
//        $books = Book::paginate(4);
//
//        if($request->ajax()) {
//            $view = view('data', compact('books'))->render();
//            return response()->json(['html'=>$view]);
//        }
//        return view('book.index', compact('books'));
//    }

    public function index(Request $request)
    {
        //
        $numPagin = 4;
        $books = Book::orderBy('created_at', 'desc')->paginate($numPagin);
        $numBooks = count(Book::all());
        $numTotalPage = $numBooks/$numPagin+1;

        if($request->ajax()) {
            $view = view('book.data', compact('books'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('book.index', compact('books', 'numTotalPage'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defaultPicPath = "/images/default-thumbnail.jpg";
        return view('book.create', compact('defaultPicPath'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        //
        $user = Auth::user();
        $input = $request->all();
        $defaultPic = 'default-thumbnail.jpg';

        if($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
        } else {
            $input['photo'] = $defaultPic;
        }

        $user->books()->create($input);

        Session::flash('created_book', 'The Book is created!');

        return redirect('/book');
//        dd($input);


//        $file = $request->file('photo');
//        echo $file->getClientOriginalName();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        if(Auth::user()->id == $book->user->id) {
            return view('book.edit', compact('book'));
        } else {
            return redirect('/book/' . $book->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookEditRequest $request, $id)
    {
        //
        $book = Book::findOrFail($id);

        $input = $request->all();
        if($file = $request->file('photo')) {
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
        }
        $book->update($input);

        Session::flash('updated_book', 'Updated the book!');

        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::findOrFail($id);
        $title = $book->title;
        Book::findOrFail($id)->delete();

        Session::flash('deleted_book', 'The Book ' . $title . ' is deleted!');

        return redirect('/book');
    }

    public function search(Request $request)
    {
        $numPagin = 4;
        $numSearched = count(Book::where($request->search_param, 'like', $request->search_text . '%')->get());
        if($numSearched<4) {
            $numPagin = $numSearched;
        }
        $books = Book::where($request->search_param, 'like', $request->search_text . '%')->paginate($numPagin);
        $numBooks = count($books);
        $numTotalPage = $numBooks/$numPagin+1;

        if($request->ajax()) {
            $view = view('book.data', compact('books'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('book.index', compact('books', 'numTotalPage'));


//        $books = Book::where('search_param', 'like', $request->get('search_text') . '%')->get();
//        return view('book.index', compact('books'));
    }


}




























