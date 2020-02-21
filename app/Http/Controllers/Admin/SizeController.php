<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Size::all();
        return view('admin.size.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'short_name' => 'required|unique:sizes|max:8',
            'full_name' => 'required|unique:sizes',
        ]);
        $data = [
            'short_name'  => $request->short_name,
            'full_name'  => $request->full_name,
            'status'  => 1,
        ];
        Size::create($data);
        $notification=array(
            'messege'=>'Size Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Size::findOrFail($id);
        return view('admin.size.show',compact('row'));
    }


    public function edit($id)
    {
        $row = Size::findOrFail($id);
        return view('admin.size.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'short_name' => 'required|max:8|unique:sizes,short_name,'.$id,
            'full_name' => 'required|unique:sizes,full_name,'.$id
        ]);
        Size::where('id',$id)->update( [
            'short_name'  => $request->short_name,
            'full_name'  => $request->full_name,
            'status'  => isset($request->status) ? 1 : 0,
        ]);

        $notification=array(
            'messege'=>'Size Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Size::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Size Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.size.index')->with($notification);
    }
    public function active($id){
        Size::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Size Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.size.index')->with($notification);
    }
    public function inactive($id){
        Size::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Size Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.size.index')->with($notification);
    }
}
