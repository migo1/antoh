<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'type_id', 'title', 'edition', 'author', 'total_books'
    ];

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function borrowers()
    {
        return $this->hasMany('App\Borrower');
    }

}
