<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    public function productByBrand($id){
        $brand_id = base64_decode($id);
        $products = Product::where('status',1)->where('brand_id',$brand_id)->orderBy('created_at','DESC')->paginate(20);
        $brand = Brand::findOrFail($brand_id);
        return view('user.pages.shop',compact('products','brand'));
    }
    public function productByCategory($id){
        $cat_id = base64_decode($id);
        $products = Product::where('status',1)->where('cat_id',$cat_id)->orderBy('created_at','DESC')->paginate(20);
        $cat = Category::findOrFail($cat_id);
        return view('user.pages.shop',compact('products','cat'));
    }
}
