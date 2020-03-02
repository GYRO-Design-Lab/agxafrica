<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function live_commodities()
    {
        return $this->hasMany('App\Models\LiveMarket');
    }
}
