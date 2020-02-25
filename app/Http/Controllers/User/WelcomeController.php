<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $cats = Category::all();
        $brands = Brand::all();
        $products = Product::where('status',1)->latest()->get();
        return view('user.home',compact('cats','brands','products'));
    }
    public function productDetails( Product $product){
        $cats = Category::all();
        $brands = Brand::all();
        return view('user.pages.product',compact('product','cats','brands'));
    }
}
