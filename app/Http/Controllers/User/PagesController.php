<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact(){
        return view('user.pages.contact');
    }
    public function shop(){
        $products = Product::where('status',1)->orderBy('created_at','DESC')->paginate(20);
        $brands = Brand::all();
        return view('user.pages.shop',compact('products','brands'));
    }
}
