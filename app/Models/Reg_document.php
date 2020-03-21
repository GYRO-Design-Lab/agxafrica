<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reg_document extends Model
{
    protected $fillable = ["type", "file"];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function getFileAttribute($value)
    {
        return \Storage::url($value);
    }
}
