<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_cat_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'p_id');
    }
    public function features()
    {
        return $this->hasMany(ProductMore::class, 'p_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
