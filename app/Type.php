<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name','shelf'
    ];

    public function books() {
        return $this->hasMany('App\Type');
    }
}
