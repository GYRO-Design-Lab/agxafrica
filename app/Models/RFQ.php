<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    protected $table = 'rfq';

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
