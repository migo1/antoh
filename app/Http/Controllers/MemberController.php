<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Book;

class MemberController extends Controller
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
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member;

        $member->first_name = $request->input('first_name');
        $member->surname = $request->input('surname');
        $member->email = $request->input('email');
        $member->contact = $request->input('contact');
        $member->occupation = $request->input('occupation');
        $member->status = $request->input('status');

        $member->save();

        return back()->with('success','Member created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        $books = Book::all();
        return view('member.show',compact('member','books'));
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
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($request->member_id);

        $member->first_name = $request->input('first_name');
        $member->surname = $request->input('surname');
        $member->email = $request->input('email');
        $member->contact = $request->input('contact');
        $member->occupation = $request->input('occupation');
        $member->status = $request->input('status');

        $member->update();

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
        $member = Member::findOrFail($request->member_id);
        $member->delete();

        return back();
    }
}
