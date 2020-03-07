<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class WebsiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function setting(){
       $setting = WebsiteSetting::firstOrFail();
       return view('admin.setting.setting',compact('setting'));
    }
    public function settingUpdate(Request $request){
        $id = $request->id;
        $row = WebsiteSetting::findOrFail($id);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            if (isset($logo)) {
                $imageName =  'logo' . time() . '.' . $logo->getClientOriginalExtension();
                $upload_path = 'public/upload/setting';
                $logo_url = $upload_path . '/' . $imageName;
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
            $logo_url = $row->logo;
        }
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            if (isset($favicon)) {
                $imageName =  'favicon' . time() . '.' . $favicon->getClientOriginalExtension();
                $upload_path = 'public/upload/setting';
                $favicon_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                if(file_exists($row->favicon)){
                    unlink($row->favicon);
                }
                $img = Image::make($favicon->getRealPath());
                $img->resize(50, 50)->save($upload_path . '/' . $imageName);
            }
        }else{
            $favicon_url = $row->favicon;
        }
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            if (isset($banner)) {
                $imageName =  'banner' . time() . '.' . $banner->getClientOriginalExtension();
                $upload_path = 'public/upload/setting';
                $banner_url = $upload_path . '/' . $imageName;
                if (!File::exists($upload_path)) {
                    File::makeDirectory($upload_path, $mode = 0777, true, true);
                }
                if(file_exists($row->banner_image)){
                    unlink($row->banner_image);
                }
                $img = Image::make($banner->getRealPath());
                $img->save($upload_path . '/' . $imageName);
            }
        }else{
            $banner_url = $row->banner_image;
        }
        WebsiteSetting::where('id',$id)->update( [
            'logo'          => $logo_url,
            'favicon'       => $favicon_url,
            'banner_image'  => $banner_url,
            'mobile_1'      => $request->mobile_1,
            'mobile_2'      => $request->mobile_2,
            'email'         => $request->email,
            'address'       => $request->address,
            'facebook'      => $request->facebook,
            'youtube'       => $request->youtube,
            'twitter'       => $request->twitter,
            'map'           => $request->google_map,
        ]);

        $notification=array(
            'messege'=>'Website Setting Updated Successfully.',
            'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
