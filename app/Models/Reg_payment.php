<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reg_payment extends Model
{
    protected $fillable = ["amount"];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
