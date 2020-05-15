<?php

namespace App\Http\Controllers\Admin;

use App\Blogcat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;


class BlogcatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BlogCategory(){
        $category = Blogcat::latest()->get();
        return view('admin.blog.category',compact('category'));
    }


    public function BlogCategoryStore(Request $request){

        $request->validate([
            'category_name' => 'required',
        
        ]);


    $cat = Blogcat::insert([

        'category_name' => $request->category_name,
        'created_at' => Carbon::now()

    ]);

    if ($cat) {
        $notification=array(
            'messege'=>'Category Inserted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    }
}
