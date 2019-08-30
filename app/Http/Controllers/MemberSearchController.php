<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;


class MemberSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $members =  Member::orderBy('created_at','desc')->paginate(10);
      //  $types = Type::all();

     //   return view('member.index',compact('members','types'))->with('i', (request()->input('page', 1) - 1) * 5);

     return view('member.index', compact('members'))->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function search(Request $request)
     {
        $members =  Member::orderBy('created_at','desc');

        if( $request->id){

            $members = $members->where('id', 'LIKE', "%" . $request->id . "%");

        }

        if( $request->contact){

            $members = $members->where('contact', 'LIKE', "%" . $request->contact . "%");

        }


        $members = $members->paginate(5);

        return view('member.index',compact('members'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
