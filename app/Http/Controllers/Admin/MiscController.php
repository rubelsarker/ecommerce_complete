<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\SubCategory;
use App\Model\Admin\SubSubCategory;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getSubCat($id){
        $subcat = SubCategory::where('category_id',$id)->select('id','name')->get();
        return json_encode($subcat);
    }
}
