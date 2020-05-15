<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use Carbon\Carbon;
use Image;

class TestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function Addtestimonial(){
        return view('admin.testimonial.add');
    }


    // store banner
    public function Store(Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'title' => 'required',
            'review' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);


        $image_name = $request->file('image');

            $image_one_name = hexdec(uniqid()).'.'.$image_name->getClientOriginalExtension();
            Image::make($image_name)->resize(135,105)->save('public/uploads/testimonial/'.$image_one_name);
            $url = 'public/uploads/testimonial/'.$image_one_name;

        $testimonial = Testimonial::insert([
            'name' => $request->name,
            'title' => $request->title,
            'review' => $request->review,
            'image' => $url,
            'created_at' => Carbon::now()

        ]);

        if ($testimonial) {
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.testimonial')->with($notification);
        }


    }


    // show all
    public function showAll(){
        $testimonial = Testimonial::latest()->get();
        return view('admin.testimonial.index',compact('testimonial'));
    }
}
