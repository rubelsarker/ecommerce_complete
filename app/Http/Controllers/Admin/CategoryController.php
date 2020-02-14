<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Category::all();
        return view('admin.category.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:50',
        ]);
        $data = [
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            'status'  => 1,
        ];
        Category::create($data);
        $notification=array(
            'messege'=>'Category Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Category::findOrFail($id);
        return view('admin.category.show',compact('row'));
    }


    public function edit($id)
    {
        $row = Category::findOrFail($id);
        return view('admin.category.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50|unique:categories,name,'.$id,
        ]);
        Category::where('id',$id)->update( [
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            'status'  => isset($request->status) ? 1 : 0,
        ]);

        $notification=array(
            'messege'=>'Category Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Category::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Category Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.category.index')->with($notification);
    }
    public function active($id){
         Category::where('id',$id)->update(['status' => 1]);
         $notification=array(
            'messege'=>'Category Active Successfully.',
            'alert-type'=>'success');
         return redirect()->route('admin.category.index')->with($notification);
    }
    public function inactive($id){
        Category::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Category Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.category.index')->with($notification);
    }
}
