<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookEditRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
            $input['user_id'] = Auth::user()->id;

        }

        Book::create($input);

        return redirect('/home');
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
    }
}
