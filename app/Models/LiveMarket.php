<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveMarket extends Model
{
    //
    protected $table = 'live_market';

    protected $casts = [
        'quantity' => 'array'
    ];

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }

    public function trades()
    {
        return $this->morphMany('App\Models\Trade', 'tradeable');
    }
}
