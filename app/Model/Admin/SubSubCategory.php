<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo('App\Model\Admin\Category', 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Model\Admin\SubCategory', 'sub_category_id');
    }
}
