<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Brand::all();
        return view('admin.brand.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:brands|max:50',
        ]);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            if (isset($logo)) {
                $imageName = $request->name . '-' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $upload_path = 'public/upload/brand';
                $image_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                $img = Image::make($logo->getRealPath());
                $img->resize(150, 100)->save($upload_path . '/' . $imageName);
            }
        }
        $data = [
            'name'         => $request->name,
            'logo'         => $image_url,
            'slug'         => Str::slug($request->name),
            'status'       => 1,
        ];
        Brand::create($data);
        $notification=array(
            'messege'=>'Brand Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Brand::findOrFail($id);
        return view('admin.brand.show',compact('row'));
    }


    public function edit($id)
    {
        $row = Brand::findOrFail($id);
        return view('admin.brand.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50|unique:brands,name,'.$id,
        ]);
        $row = Brand::findOrFail($id);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            if (isset($logo)) {
                $imageName = $request->name . '-' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $upload_path = 'public/upload/brand';
                $image_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                if(file_exists($row->logo)){
                    unlink($row->logo);
                }
                $img = Image::make($logo->getRealPath());
                $img->resize(150, 100)->save($upload_path . '/' . $imageName);
            }
        }else{
            $image_url = $row->logo;
        }
        Brand::where('id',$id)->update( [
            'name'         => $request->name,
            'logo'         => $image_url,
            'slug'         => Str::slug($request->name),
            'status'       => isset($request->status) ? 1 : 0,
        ]);

        $notification=array(
            'messege'=>'Brand Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Brand::findOrFail($id);
        if(file_exists($row->logo)){
            unlink($row->logo);
        }
        $row->delete();
        $notification=array(
            'messege'=>'Brand Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.brand.index')->with($notification);
    }
    public function active($id){
        Brand::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Brand Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.brand.index')->with($notification);
    }
    public function inactive($id){
        Brand::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Brand Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.brand.index')->with($notification);
    }
}
