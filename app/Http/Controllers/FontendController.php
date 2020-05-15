<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Banner;
use App\Category;
use App\Product;
use App\Testimonial;
use App\Blog;
use App\Blogcat;
use App\Cart;
use App\Comment;
use App\Faq;
use App\product_multiple_photo;
use App\Productreview;

class FontendController extends Controller
{

    // logout
    public function logout(){


        Auth::logout();
        $notification=array(
            'messege'=>'Logout Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('login')->with($notification);
    }

    // index page
    public function index(){
        return view('pages.index' ,[
            'banners' => Banner::latest()->limit(10)->where('status',1)->get(),
            'testimonials' => Testimonial::latest()->where('status',1)->get(),
            'products' => Product::latest()->where('status',1)->get(),


        ]);
    }

    // contact page

    public function contactPage(){
        return view('pages.contact');
    }

    // about page
    public function aboutPage(){
        return view('pages.about');
    }

    // blog page
    public function BlogPage(){
        return view('pages.blog',[
            'blogs' => Blog::latest()->where('status',1)->paginate(6),

        ]);
    }

    // blog post Details

    public function PostDetails($id){
        return view('pages.blogdetails',[
            'blogs' => Blog::find($id),
            'blog' => Blog::latest()->where('status',1)->get(),
            'categories' => Blogcat::orderBy('category_name','ASC')->get(),
            'comments' => Comment::latest()->where('post_id',$id)->where('status',1)->get()

        ]);
    }


    // product view

    public function ProductDetails($id){


        $products = Product::find($id);
        // related product
    //    echo  $category_id = Product::find($id)->category_id;
        $category_id = $products->category_id;
        $related_p = Product::where('category_id',$category_id)->where('id','!=',$id)->get();
        $multiple_photos = product_multiple_photo::where('product_id',$id)->get();
        $product_reviews = Productreview::where('product_id',$id)->get();
        $faqs = Faq::latest()->get();

        return view('pages.productdetails',compact('products','related_p','multiple_photos','product_reviews','faqs'));

    }


    // Shop page

    public function ShopPage(){
        return view('pages.shop',[
            'categories' => Category::all(),
            'products' => Product::latest()->get()
        ]);
    }
}
