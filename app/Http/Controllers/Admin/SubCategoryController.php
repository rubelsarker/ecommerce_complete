<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = SubCategory::all();
        return view('admin.subcategory.index',compact('rows'));
    }


    public function create()
    {
        $cats = Category::all();
        return view('admin.subcategory.create',compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:sub_categories|max:50',
            'category_id'   => 'required',

        ]);
        $data = [
            'name'         => $request->name,
            'category_id'  => $request->category_id,
            'slug'         => Str::slug($request->name),
            'status'       => 1,
        ];
        SubCategory::create($data);
        $notification=array(
            'messege'=>'Subcategory Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = SubCategory::findOrFail($id);
        return view('admin.subcategory.show',compact('row'));
    }


    public function edit($id)
    {
        $row = SubCategory::findOrFail($id);
        $cats = Category::all();
        return view('admin.subcategory.edit',compact('row','cats'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:50|unique:sub_categories,name,'.$id,
            'category_id'   => 'required',

        ]);
        SubCategory::where('id',$id)->update( [
            'name'         => $request->name,
            'category_id'  => $request->category_id,
            'slug'         => Str::slug($request->name),
            'status'       => isset($request->status) ? 1 : 0,
        ]);

        $notification=array(
            'messege'=>'Subcategory Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = SubCategory::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Subcategory Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.subcategory.index')->with($notification);
    }
    public function active($id){
        SubCategory::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Subcategory Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.subcategory.index')->with($notification);
    }
    public function inactive($id){
        SubCategory::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Subcategory Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.subcategory.index')->with($notification);
    }
}
