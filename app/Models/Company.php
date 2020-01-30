<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ["address", "contact_person", "contact_phone", "contact_email", "commodities"];

    protected $casts = [
        'commodities' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function reg_documents()
    {
        return $this->hasMany('App\Models\Reg_document');
    }

    public function reg_payments()
    {
        return $this->hasMany('App\Models\Reg_payment');
    }
}
