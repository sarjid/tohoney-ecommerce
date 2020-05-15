<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Carbon\Carbon;
use Image;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddBanner(){
        return view('admin.banner.add');
    }


    // store banner
    public function Store(Request $request){
        $request->validate([
            'banner_title' => 'required',
            'banner_description' => 'required',
            'banner_image' => 'required|mimes:jpg,jpeg.png.gif',
        ]);


        $image_name = $request->file('banner_image');

            $image_one_name = hexdec(uniqid()).'.'.$image_name->getClientOriginalExtension();
            Image::make($image_name)->resize(1920,1000)->save('public/uploads/slider/'.$image_one_name);
            $url = 'public/uploads/slider/'.$image_one_name;

        $banner = Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_description' => $request->banner_description,
            'banner_image' => $url,
            'created_at' => Carbon::now()

        ]);

        if ($banner) {
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.banner')->with($notification);
        }


    }


    // show all
    public function ShowBanner(){
        $banners = Banner::latest()->get();
        return view('admin.banner.index',compact('banners'));
    }

    // status inactive

    public function inactive($id){
        $banner = Banner::find($id);
        $banner->status = 0;
        $banner->save();
        $notification=array(
            'messege'=>'Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }


    // status active

    public function active($id){
        $banner = Banner::find($id);
        $banner->status = 1;
        $banner->save();
        $notification=array(
            'messege'=>'Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    // Edit

    public function Edit($id){
        $banners = Banner::find($id);
        return view('admin.banner.edit',compact('banners'));
    }

    // Update
    public function update(Request $request,$id){
        $request->validate([
            'banner_title' => 'required',
            'banner_description' => 'required',
            'banner_image' => 'mimes:jpg,jpeg.png.gif',
        ]);

            $old_image = $request->old_image;
            $image_name = $request->file('banner_image');

           if($image_name){
                unlink($old_image);
                $image_one_name = hexdec(uniqid()).'.'.$image_name->getClientOriginalExtension();
                Image::make($image_name)->resize(1920,1000)->save('public/uploads/slider/'.$image_one_name);
                $url = 'public/uploads/slider/'.$image_one_name;

                $banner = Banner::find($id)->update([
                    'banner_title' => $request->banner_title,
                    'banner_description' => $request->banner_description,
                    'banner_image' => $url,
                    'created_at' => Carbon::now()

                ]);

                if ($banner) {
                    $notification=array(
                        'messege'=>'Banner Updated',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.banner')->with($notification);
                }

           }else{
            $banner = Banner::find($id)->update([
                'banner_title' => $request->banner_title,
                'banner_description' => $request->banner_description,
                'created_at' => Carbon::now()

            ]);

            if ($banner) {
                $notification=array(
                    'messege'=>'Banner Updated',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.banner')->with($notification);
            }

           }


    }

    // delete

    public function Delete($id){
        $data = Banner::find($id);
       $image =  $data->banner_image;

       unlink($image);
       $delete = Banner::find($id)->delete();

       if ($delete) {
        $notification=array(
            'messege'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);


       }


    }

}
