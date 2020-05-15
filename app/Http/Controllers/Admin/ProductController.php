<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Image;
use Illuminate\Support\Carbon;
use App\Category;
use App\product_multiple_photo;
use Facade\FlareClient\Http\Response;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function AddProduct(){
        $category = Category::orderBy('category_name','ASC')->get();
        return view('admin.product.add',compact('category'));
    }


    // storeproduct
    public function StoreProduct(Request $request){
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_thambnail' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'Category Name Required',
            'product_thambnail.required' => 'Select An Image',

        ]);



        $image_name = $request->file('product_thambnail');

            $image_one_name = hexdec(uniqid()).'.'.$image_name->getClientOriginalExtension();
            Image::make($image_name)->resize(600,622)->save('public/uploads/product/'.$image_one_name);
            $url = 'public/uploads/product/'.$image_one_name;

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_thambnail' => $url,
            'created_at' => Carbon::now()

        ]);

    //    multiple image upload start
        $img_name = $request->file('product_multiple_photos');
        foreach($img_name as $multi_img){

            $image_one_name = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(600,622)->save('public/uploads/product/'.$image_one_name);
            $url = 'public/uploads/product/'.$image_one_name;

            product_multiple_photo::insert([
                'product_id' => $product_id,
                'photo_name' => $url,
                'created_at' => Carbon::now()

            ]);

         }
        //  multiple imag upload end

            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);



    }


    // show all
    public function AllProduct(){
        $product = Product::latest()->get();
        return view('admin.product.index',compact('product'));
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
                    Image::make($image_name)->resize(600,622)->save('public/uploads/product/'.$image_one_name);
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


    //   view product modal with ajax

    public function viewProductAjax($id){

      $product = Product::find($id);
      return Response($product);

    }

}
