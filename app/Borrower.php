<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'book_id', 'member_id', 'borrow_date', 'return_date', 'return_day',
        'total_days', 'status', 'amount'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
