<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renew extends Model
{
    protected $fillable = [
        'member_id', 'amount', 'date'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
    
}
