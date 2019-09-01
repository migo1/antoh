<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Borrower;

class BorrowerController extends Controller
{
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
        $borrower = new Borrower;

        $borrower->book_id = $request->input('book_id');
        $borrower->member_id = $request->input('member_id');
        $borrower->borrow_date = $request->input('borrow_date');
        $borrower->return_date = $request->input('return_date');
        $borrower->return_day = $request->input('return_day');
        $borrower->total_days = $request->input('total_days');
        $borrower->status = $request->input('status');
        $borrower->amount = $request->input('amount');

        $borrower->save();

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
        $borrower = Borrower::findOrFail($request->borrower_id);

        $borrower->book_id = $request->input('book_id');
        $borrower->member_id = $request->input('member_id');
        $borrower->borrow_date = $request->input('borrow_date');
        $borrower->return_date = $request->input('return_date');
        $borrower->return_day = $request->input('return_day');
        $borrower->total_days = $request->input('total_days');
        $borrower->status = $request->input('status');
        $borrower->amount = $request->input('amount');

        $borrower->update();

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
        $borrower = Borrower::findOrFail($request->borrower_id);
        $borrower->delete();
        return back();
    }
}
