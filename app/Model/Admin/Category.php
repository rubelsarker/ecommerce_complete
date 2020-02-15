<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function subcategories()
    {
        return $this->hasMany('App\Model\Admin\SubCategory','category_id');
    }
}
