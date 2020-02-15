<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo('App\Model\Admin\Category', 'category_id');
    }
    public function subsubcategories()
    {
        return $this->hasMany('App\Model\Admin\SubSubCategory','sub_category_id');
    }
}
