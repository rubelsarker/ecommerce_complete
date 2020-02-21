<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Unit::all();
        return view('admin.unit.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'short_name' => 'required|unique:units|max:8',
            'full_name' => 'required|unique:units',
        ]);
        $data = [
            'short_name'  => $request->short_name,
            'full_name'  => $request->full_name,
            'status'  => 1,
        ];
        Unit::create($data);
        $notification=array(
            'messege'=>'Unit Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Unit::findOrFail($id);
        return view('admin.unit.show',compact('row'));
    }


    public function edit($id)
    {
        $row = Unit::findOrFail($id);
        return view('admin.unit.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'short_name' => 'required|max:8|unique:units,short_name,'.$id,
            'full_name' => 'required|unique:units,full_name,'.$id
        ]);
        Unit::where('id',$id)->update( [
            'short_name'  => $request->short_name,
            'full_name'  => $request->full_name,
            'status'  => isset($request->status) ? 1 : 0,
        ]);

        $notification=array(
            'messege'=>'Unit Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Unit::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Unit Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.unit.index')->with($notification);
    }
    public function active($id){
        Unit::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Unit Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.unit.index')->with($notification);
    }
    public function inactive($id){
        Unit::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Unit Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.unit.index')->with($notification);
    }
}
