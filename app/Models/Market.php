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

    public function trades()
    {
        return $this->morphMany('App\Models\Trade', 'tradeable');
    }
    
    public function getPhotoAttribute($value)
    {
        return \Storage::url($value);
    }
}
