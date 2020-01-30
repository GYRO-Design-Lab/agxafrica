<?php

namespace App\Models;


use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasSlug;

    protected $fillable = ["address", "contact_person", "contact_phone", "contact_email", "commodities"];

    protected $casts = [
        'commodities' => 'array'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

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

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
