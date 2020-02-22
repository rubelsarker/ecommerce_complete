<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Color;
use App\Model\Admin\Product;
use App\Model\Admin\ProductImage;
use App\Model\Admin\ProductMore;
use App\Model\Admin\Size;
use App\Model\Admin\SubCategory;
use App\Model\Admin\SubSubCategory;
use App\Model\Admin\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Product::all();
        return view('admin.product.index',compact('rows'));
    }


    public function create()
    {
        $brands = Brand::all();
        $cats = Category::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create',compact('brands','cats','units','sizes','colors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'cat_id'        => 'required',
            'quantity'      => 'required',
            'price'         => 'required'
        ]);
        $data = [
            'name'                  => $request->name,
            'p_code'                => $request->p_code,
            'brand_id'              => $request->brand_id,
            'cat_id'                => $request->cat_id,
            'sub_cat_id'            => $request->sub_cat_id,
            'sub_sub_cat_id'        => $request->sub_sub_cat_id,
            'unit'                  => $request->unit,
            'quantity'              => $request->quantity,
            'price'                 => $request->price,
            'size'                  => $request->size,
            'color'                 => $request->color,
            'description'           => $request->description,
            'slug'                  => Str::slug($request->name),
            'status'                => 1,
            'variant'               => isset($request->variant) ? 1 : 0,
            'discount'              => isset($request->discount) ? 1 : 0,
            'discount_percent'      => $request->discount_percent
        ];
        $p_id = Product::create($data);
        if($files=$request->file('images')){
            foreach($files as $file){
                $imageName = Str::slug($request->name).'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $upload_path='public/upload/product';
                $image_url=$upload_path.'/'.$imageName;
                if (! File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                $img = Image::make($file->getRealPath());
                $img->resize(300, 300)->save($upload_path.'/'.$imageName);
                ProductImage::create([
                    'p_id'  => $p_id->id,
                    'image' => $image_url
                ]);
            }
        }
        $mores = $request->input('more_option');
        $m = $mores[0];
        if ($m['key'] != null && $m['value'] != null){
            foreach ($mores as $more){
                ProductMore::create(['p_id' => $p_id->id,'key' => $more['key'],'value' => $more['value']]);
            }
        }
        $notification=array(
            'messege'=>'Product Added Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {
        $row = Product::findOrFail($id);
        return view('admin.product.show',compact('row'));
    }


    public function edit($id)
    {
        $brands = Brand::all();
        $cats = Category::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        $row = Product::findOrFail($id);
        $subcats = SubCategory::where('category_id',$row->cat_id)->get();
        $subsubcats = SubSubCategory::where('sub_category_id',$row->sub_cat_id)->get();
        return view('admin.product.edit',compact('brands','cats','units','sizes','colors','row','subcats','subsubcats'));
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'name'          => 'required',
            'cat_id'        => 'required',
            'quantity'      => 'required',
            'price'         => 'required'
        ]);
        Product::where('id',$id)->update([
            'name'                  => $request->name,
            'p_code'                => $request->p_code,
            'brand_id'              => $request->brand_id,
            'cat_id'                => $request->cat_id,
            'sub_cat_id'            => $request->sub_cat_id,
            'sub_sub_cat_id'        => $request->sub_sub_cat_id,
            'unit'                  => $request->unit,
            'quantity'              => $request->quantity,
            'price'                 => $request->price,
            'size'                  => $request->size,
            'color'                 => $request->color,
            'description'           => $request->description,
            'slug'                  => Str::slug($request->name),
            'status'                => isset($request->status) ? 1 : 0,
            'variant'               => isset($request->variant) ? 1 : 0,
            'discount'              => isset($request->discount) ? 1 : 0,
            'discount_percent'      => $request->discount_percent
        ]);

        if($files=$request->file('images')){
            foreach($files as $file){
                $imageName = Str::slug($request->name).'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $upload_path='public/upload/product';
                $image_url=$upload_path.'/'.$imageName;
                if (! File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                $img = Image::make($file->getRealPath());
                $img->resize(300, 300)->save($upload_path.'/'.$imageName);
                ProductImage::create([
                    'p_id'  => $id,
                    'image' => $image_url
                ]);
            }
        }
        $mores = $request->input('more_option');
        $m = $mores[0];
        //$itids = [];
        if ($m['key'] != null && $m['value'] != null){
            foreach ($mores as $more){
                if(isset($more['more_info_id'])) {
                    ProductMore::where('id', $more['more_info_id'])->update(['p_id' => $id, 'key' => $more['key'], 'value' => $more['value']]);
                    //$itids[] = $more['more_info_id'];
                }
                else{
                    ProductMore::create(['p_id' => $id, 'key' => $more['key'], 'value' => $more['value']]);
                }
            }
        }
        //$itemMores = ProductMore::where('p_id',$id)->get();
//        foreach ($itemMores as $im){
//            if(!in_array($im->id,$itids) && count($itids)>0){
//                $im->delete();
//            }
//        }

        $notification=array(
            'messege'=>'Product Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $row = Product::findOrFail($id);
        foreach ($row->images as $img){
            if(file_exists($img->image)){
                unlink($img->image);
            }
        }
        $row->delete();
        $notification=array(
            'messege'=>'Product Deleted Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.product.index')->with($notification);
    }
    public function active($id){
        Product::where('id',$id)->update(['status' => 1]);
        $notification=array(
            'messege'=>'Product Active Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.product.index')->with($notification);
    }
    public function inactive($id){
        Product::where('id',$id)->update(['status' => 0]);
        $notification=array(
            'messege'=>'Product Inactive Successfully.',
            'alert-type'=>'success');
        return redirect()->route('admin.product.index')->with($notification);
    }
    public function deleteImage(Request $request){
       // dd($request->id);
        $row =  ProductImage::where('id',$request->id)->first();
        if(file_exists($row->image)){
            unlink($row->image);
        }
        $row->delete();
        return response()->json(['code'=>200]);

    }
    public function deleteMf($id){
        $row = ProductMore::where('id',$id)->first();
        $row->delete();
        return response()->json(['code'=>200]);
    }
}
