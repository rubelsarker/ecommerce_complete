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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
