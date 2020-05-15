<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Wishlist;
use App\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function addwishlist($id){
    if (Cart::where('product_id',$id)->where('ip_address',request()->ip())->exists()) {
        return response()->json(['error' => 'Product Already has on your Cart']);       

    }elseif(Wishlist::where('product_id',$id)->where('ip_address',request()->ip())->exists()){
            // $notification=array(
            //     'messege'=>'Already Has On wishlist',
            //     'alert-type'=>'error'
            // );
            // return Redirect()->back()->with($notification);

            return response()->json(['error' => 'Product Already has on your wishlist']);

        }else{

            Wishlist::insert([
                'product_id' =>$id,
                'quantity' =>1,
                'ip_address' => request()->ip(),
                'created_at' =>Carbon::now()

            ]);

            return response()->json(['success' => 'Successfully Added on your wishlist']);


        }

        


    }

    // delete wishlist
    public function Deletewishlist($id){

            $delete = Wishlist::find($id)->delete();
            return Redirect()->back();



    }

    // wishlist page
    public function wishlistPage(){

        $wishlists = Wishlist::all();
        return view('pages.wishlist',compact('wishlists'));
    }


    // add to cart from wishlistPage
    public function AddCartFromWishlist(Request $request){
        $wid = $request->w_id;

        if(Cart::where('product_id',$request->product_id)->where('ip_address',request()->ip())->exists()){
            $notification=array(
                'messege'=>'Already Has On Cart',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);

        }else{

            $delete = Wishlist::find($wid)->delete();

            $cart = Cart::insert([
                'product_id' => $request->product_id,
                'ip_address' => request()->ip(),
                'quantity' => $request->quantity,
                'created_at' => Carbon::now()
            ]);

            $notification=array(
                'messege'=>'Added To Cart',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);


        }




    }




}
