<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'first_name', 'surname', 'email', 'contact', 'occupation', 'status'
    ];

    public function borrowers()
    {
        return $this->hasMany('App\Borrower');
    }

    public function renews()
    {
        return $this->hasMany('App\Renew');
    }
}
