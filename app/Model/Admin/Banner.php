<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
