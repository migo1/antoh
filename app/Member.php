<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'first_name', 'surname', 'email', 'contact', 'occupation', 'status'
    ];
}
