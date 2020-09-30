<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,SoftDeletes;

    protected $translatedAttributes = ['name','description','short_description'];
    protected $with = ['translations'];
    protected $fillable = [
        'slug','price', 'special_price','special_price_type','special_price_start','special_price_end',
        'selling_price','sku','manage_stock','qty','in_stock','viewed','is_active','brand_id',
    ];

    protected $hidden = ['translations'];


    protected $casts = [
        'is_active' => 'boolean',
        'in_stock' => 'boolean',
        'manage_stock' => 'boolean',
    ];

    protected $dates = [
        'special_price_type',
        'special_price_start',
        'deleted_at',
        'manage_stock',
        'manage_st  ock',
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
