<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $cats = Category::all();
        $brands = Brand::all();
        return view('user.home',compact('cats','brands'));
    }
}