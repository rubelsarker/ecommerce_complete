<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\SubCategory;
use App\Model\Admin\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = SubSubCategory::all();
        return view('admin.sub-subcategory.index',compact('rows'));
    }


    public function create()
    {
        $cats = Category::all();
        return view('admin.sub-subcategory.create',compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|unique:sub_sub_categories|max:50',
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
        ]);
        $data = [
            'name'             => $request->name,
            'category_id'      => $request->category_id,
            'sub_category_id'  => $request->sub_category_id,
            'slug'             => Str::slug($request->name),
            'status'           => 1,
        ];
        SubSubCategory::create($data);
        $notification=array(
            'messege'=>'Sub Subcategory Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = SubSubCategory::findOrFail($id);
        return view('admin.sub-subcategory.show',compact('row'));
    }


    public function edit($id)
    {
        $row = SubSubCategory::findOrFail($id);
        $cats = Category::all();
        $subcats = SubCategory::all();
        return view('admin.sub-subcategory.edit',compact('row','cats','subcats'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|max:50|unique:sub_sub_categories,name,'.$id,
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);
        SubSubCategory::where('id',$id)->update( [
            'name'             => $request->name,
            'category_id'      => $request->category_id,
            'sub_category_id'  => $request->sub_category_id,
            'slug'             => Str::slug($request->name),
            'status'           => 1,
        ]);

        $notification=array(
            'messege'=>'Sub Subcategory Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = SubSubCategory::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Sub Subcategory Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.sub-subcategory.index')->with($notification);
    }
    public function active($id){
        SubSubCategory::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'SUb Subcategory Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.sub-subcategory.index')->with($notification);
    }
    public function inactive($id){
        SubSubCategory::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Sub Subcategory Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.sub-subcategory.index')->with($notification);
    }
}
