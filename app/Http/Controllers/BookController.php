<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Type;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;

        $book->type_id = $request->input('type_id');
        $book->title = $request->input('title');
        $book->edition = $request->input('edition');
        $book->author = $request->input('author');
        $book->total_books = $request->input('total_books');

        $book->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $book = Book::findOrFail($request->book_id);

        $book->type_id = $request->input('type_id');
        $book->edition = $request->input('edition');
        $book->author = $request->input('author');
        $book->total_books = $request->input('total_books');

        $book->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $book->delete();

        return back();
    }
}
