<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Banner;
use App\Model\Admin\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->latest()->get();
        $banner = Banner::active()->firstOrFail();
        return view('user.home',compact('products','banner'));
    }
    public function productDetails( Product $product){
        //dd($product);
        return view('user.pages.product',compact('product'));
    }
}
