<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Coupon;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    // add to cart from Product Details
    public function AddCart(Request $request){


        if(Cart::where('product_id',$request->p_id)->where('ip_address',request()->ip())->exists()){
            Cart::where('product_id',$request->p_id)->where('ip_address',request()->ip())->increment('quantity',$request->quantity);

        }else{

            $cart = Cart::insert([
                'product_id' => $request->p_id,
                'ip_address' => request()->ip(),
                'quantity' => $request->quantity,
                'created_at' => Carbon::now()
            ]);


        }


        $notification=array(
            'messege'=>'Added To Cart',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    // add cart with ajax
    public function AddCartAjax($id){

        if(Cart::where('product_id',$id)->where('ip_address',request()->ip())->exists()){

            return response()->json(['error' => 'Product Already has on your Cart']);

        }else{

            $cart = Cart::insert([
                'product_id' => $id,
                'ip_address' => request()->ip(),
                'quantity' => 1,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'Product Added On Cart']);

        }


    }


    // Cart Page

    public function CartPage($coupon_name = ""){
        if($coupon_name){
            $exist = Coupon::where('coupon_name',$coupon_name)->exists();

            if ($exist) {

                if (Coupon::where('coupon_name',$coupon_name)->first()->validity_till >= Carbon::now()->format('Y-m-d')) {

                    $carts = Cart::where('ip_address',request()->ip())->get();
                    $discount_amount = Coupon::where('coupon_name',$coupon_name)->first()->discount_amount;

                    return view('pages.cart',compact('carts','discount_amount'));


                }else{
                    $notification=array(
                        'messege'=>'Invalid Coupon',
                        'alert-type'=>'error'
                    );
                    return Redirect()->back()->with($notification);
                }

            }else{
                $notification=array(
                    'messege'=>'Coupon Not Found',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }

        }else{
            $carts = Cart::where('ip_address',request()->ip())->get();
            return view('pages.cart',compact('carts'));

        }

    }

    // Delete

    public function DeleteCart($id){
        $delete = Cart::find($id)->delete();
        return Redirect()->back();

    }


    // // Delete Cart ajax
    // public function DeleteCartAjax($id){
    //     $delete = Cart::find($id)->delete();
    //     return response()->json(['error' => 'Product Remove']);

    // }

    // update cart
    public function UpdateCart(Request $request){


        foreach ($request->cart_quantity as $cart_id => $quantity_updated) {

            Cart::find($cart_id)->update([
                'quantity' => $quantity_updated

            ]);


        }

        return Redirect()->back();
    }



}
