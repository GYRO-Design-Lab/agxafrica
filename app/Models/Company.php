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

    public function reg_payment()
    {
        return $this->hasOne('App\Models\Reg_payment');
    }

    public function commodities()
    {
        return $this->hasMany('App\Models\Market');
    }

    public function warehouses()
    {
        return $this->hasMany('App\Models\Warehouse');
    }

    public function rfqs()
    {
        return $this->hasMany('App\Models\RFQ');
    }

    public function trade_investments()
    {
        return $this->hasMany('App\Models\Trade', 'buyer_id', 'id');
    }

    public function trade_sales()
    {
        return $this->hasMany('App\Models\Trade', 'seller_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
