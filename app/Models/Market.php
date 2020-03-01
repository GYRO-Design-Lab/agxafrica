<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    // commodities
    protected $table = 'market';

    protected $casts = [
        'quantity' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
