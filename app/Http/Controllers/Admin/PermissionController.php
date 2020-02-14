<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Bitfumes\Multiauth\Model\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Permission::orderBy('id','desc')->get();
        return view('admin.permission.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.permission.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|max:25',
        ]);
        $data = [
            'name'  => $request->name,
        ];
        Permission::create($data);
        $notification=array(
            'messege'=>'Permission Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $row = Permission::findOrFail($id);
        $row->delete();
        $notification=array(
            'messege'=>'Permission Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.permission.index')->with($notification);
    }
}
