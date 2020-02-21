<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Color::all();
        return view('admin.color.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colors|max:25',
            'code' => 'required|unique:colors',
        ]);
        $data = [
            'name'  => $request->name,
            'code'  => $request->code,
            'status'  => 1,
        ];
        Color::create($data);
        $notification=array(
            'messege'=>'Color Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Color::findOrFail($id);
        return view('admin.color.show',compact('row'));
    }


    public function edit($id)
    {
        $row = Color::findOrFail($id);
        return view('admin.color.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:25|unique:colors,name,'.$id,
            'code' => 'required|unique:colors,code,'.$id
        ]);
        Color::where('id',$id)->update( [
            'name'    => $request->name,
            'code'    => $request->code,
            'status'  => isset($request->status) ? 1 : 0,
        ]);

        $notification=array(
            'messege'=>'Color Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Color::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Color Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.color.index')->with($notification);
    }
    public function active($id){
        Color::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Color Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.color.index')->with($notification);
    }
    public function inactive($id){
        Color::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Color Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.color.index')->with($notification);
    }
}
