<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Type;


class BookSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $books =  Book::orderBy('created_at','desc')->paginate(10);
        $types = Type::all();

        return view('book.index',compact('books','types'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function search(Request $request)
     {
        $books =  Book::orderBy('created_at','desc');
        $types = Type::all();

        if( $request->type_id){

            $books = $books->where('type_id', 'LIKE', "%" . $request->type_id . "%");

        }

        if( $request->title){

            $books = $books->where('title', 'LIKE', "%" . $request->title . "%");

        }

        if( $request->author){

            $books = $books->where('author', 'LIKE', "%" . $request->author . "%");

        }

        $books = $books->paginate(10);

        return view('book.index',compact('books','types'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
