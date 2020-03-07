<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Banner::all();
        return view('admin.banner.index',compact('rows'));
    }


    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            if (isset($banner)) {
                $imageName = 'banner' . uniqid() . '.' . $banner->getClientOriginalExtension();
                $upload_path = 'public/upload/banner';
                $banner_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                $img = Image::make($banner->getRealPath());
                $img->save($upload_path . '/' . $imageName);
            }
        }
        if ($request->hasFile('banner_product')) {
            $banner_product = $request->file('banner_product');
            if (isset($banner_product)) {
                $imageName = 'banner_product' . uniqid() . '.' . $banner_product->getClientOriginalExtension();
                $upload_path = 'public/upload/banner/product';
                $product_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                $img = Image::make($banner_product->getRealPath());
                $img->resize('250','250')->save($upload_path . '/' . $imageName);
            }
        }
        $data = [
            'banner_text'   => $request->banner_text,
            'product_name'  => $request->product_name,
            'product_price' => $request->product_price,
            'banner'        => $banner_url,
            'banner_product'=> $product_url,
            'status'        => isset($request->status) ? 1 :0,
        ];
        Banner::create($data);
        $notification=array(
            'messege'=>'Banner Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Banner::findOrFail($id);
        return view('admin.banner.show',compact('row'));
    }


    public function edit($id)
    {
        $row = Banner::findOrFail($id);
        return view('admin.banner.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $row = Banner::findOrFail($id);
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            if (isset($banner)) {
                $imageName = 'banner' . uniqid() . '.' . $banner->getClientOriginalExtension();
                $upload_path = 'public/upload/banner';
                $banner_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                if(file_exists($row->banner)){
                    unlink($row->banner);
                }
                $img = Image::make($banner->getRealPath());
                $img->save($upload_path . '/' . $imageName);
            }
        }else{
            $banner_url = $row->banner;
        }
        if ($request->hasFile('banner_product')) {
            $banner_product = $request->file('banner_product');
            if (isset($banner_product)) {
                $imageName = 'banner_product' . uniqid() . '.' . $banner_product->getClientOriginalExtension();
                $upload_path = 'public/upload/banner/product';
                $product_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                if(file_exists($row->banner_product)){
                    unlink($row->banner_product);
                }
                $img = Image::make($banner_product->getRealPath());
                $img->resize('250','250')->save($upload_path . '/' . $imageName);
            }
        } else{
            $product_url = $row->banner_product;
        }

        Banner::where('id',$id)->update( [
            'banner_text'   => $request->banner_text,
            'product_name'  => $request->product_name,
            'product_price' => $request->product_price,
            'banner'        => $banner_url,
            'banner_product'=> $product_url,
            'status'        => isset($request->status) ? 1 :0,
        ]);

        $notification=array(
            'messege'=>'Banner Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Banner::findOrFail($id);
        if(file_exists($row->banner)){
            unlink($row->banner);
        }
        if(file_exists($row->banner_product)){
            unlink($row->banner_product);
        }
        $row->delete();
        $notification=array(
            'messege'=>'Banner Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.banner.index')->with($notification);
    }
    public function active($id){
        Banner::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Banner Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.banner.index')->with($notification);
    }
    public function inactive($id){
        Banner::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Banner Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.banner.index')->with($notification);
    }
}
