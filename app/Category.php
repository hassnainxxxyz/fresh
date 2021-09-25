<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];


    public function categories()
    {
        return $this->belongsToMany(self::class, 'category_categories', 'category_id', 'related_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }






}
