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
}
