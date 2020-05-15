<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Blogcat;
use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Product;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function AddPost(){

        $category = Blogcat::all();
        return view('admin.blog.add',compact('category'));
    }


    // storeproduct
    public function StorePost(Request $request){

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'Category Name Required',
            'image.required' => 'Select An Image',

        ]);



        $image_name = $request->file('image');

            $image_one_name = hexdec(uniqid()).'.'.$image_name->getClientOriginalExtension();
            Image::make($image_name)->resize(500,364)->save('public/uploads/blog/'.$image_one_name);
            $url = 'public/uploads/blog/'.$image_one_name;

        $post = Blog::insert([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'added_by' => Auth::user()->id,
            'image' => $url,
            'created_at' => Carbon::now()

        ]);

        if ($post) {
            $notification=array(
                'messege'=>'Post inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }


    }


    // show all
    public function AllPost(){

        $post = Blog::latest()->get();
        return view('admin.blog.index',compact('post'));
    }


    // product View
    public function ProductView($id){
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.view',compact('product','category'));
    }

    // delete

    public function DeleteProduct($id){
        $getOldimg = Product::find($id);
        $img = $getOldimg->product_thambnail;

        unlink($img);
        $delete = Product::find($id)->delete();

        if($delete){
            $notification=array(
                'messege'=>'Successfully Deleted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }


    }


    // edit

    public function Edit($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit',compact('product','category'));
    }


    // update

    public function Update(Request $request,$id){
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',

        ],[
            'category_id.required' => 'Category Name Required',

        ]);

        $image = $request->file('product_thambnail');
        $old_image = $request->old_image;

        if ($image) {
                unlink($old_image);
                $image_name = $request->file('product_thambnail');
                    $image_one_name = hexdec(uniqid()).'.'.$image_name->getClientOriginalExtension();
                    Image::make($image_name)->resize(135,105)->save('public/uploads/product/'.$image_one_name);
                    $url = 'public/uploads/product/'.$image_one_name;

                $product = Product::find($id)->update([
                    'category_id' => $request->category_id,
                    'product_name' => $request->product_name,
                    'product_quantity' => $request->product_quantity,
                    'product_price' => $request->product_price,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'product_thambnail' => $url,
                    'created_at' => Carbon::now()

                ]);

                if ($product) {
                    $notification=array(
                        'messege'=>'Successfully Updated',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }

        }else{
            $product = Product::find($id)->update([
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'product_quantity' => $request->product_quantity,
                'product_price' => $request->product_price,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'created_at' => Carbon::now()

            ]);

            if ($product) {
                $notification=array(
                    'messege'=>'Successfully Updated',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.product')->with($notification);
            }

        }


    }


    // inactive
    public function Inactive($id){
      $product = Product::find($id)->update([
          'status' => 0

      ]);

        $notification=array(
            'messege'=>'Product Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }



    // inactive
    public function Active($id){
        $product = Product::find($id)->update([
            'status' => 1

        ]);

          $notification=array(
              'messege'=>'Product Active',
              'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);

      }

    //   Comment 

    public function AllComment(){
        $comments = Comment::latest()->get();
        return view('admin.blog.comment',compact('comments'));
    }

    // publish comment 

    public function PublishComment($id){

        $publish = Comment::find($id)->update([
            'status' => 1

        ]);
            
        if($publish){
            $notification=array(
                'messege'=>'Comment Approve Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
  

        }
    }

    // view comment 

    public function ViewComment($id){

        $comments = Comment::find($id);
        return view('admin.blog.viewcomment',compact('comments'));
    }

    // Delete 
    public function DeleteComment($id){
        
        $Delete = Comment::find($id)->delete();
        if($Delete){
            $notification=array(
                'messege'=>'Comment Deleted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
  

        }

    }


}
