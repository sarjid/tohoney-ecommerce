<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_list;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // checkout page
    public function CheckoutPage(Request $request){
        if (Auth::user()->role == 1) {
           return Redirect()->back();
        }else{

            return view('pages.checkout',[
                'carts' => Cart::where('ip_address',request()->ip())->get(),
                'total' => $request->total,
                'discount_amount' => $request->discount_amount,
            ]);
        }

    }

    // checkout data post or strore

    public function CheckoutPost(Request $request){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'notes' => 'required',
            'payment_option' => 'required',

        ]);

        if ($request->payment_option == 1) {

            $order_id =   Order::insertGetId([
                'user_id' => Auth::id(),
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' =>  $request->address,
                'post_code' => $request->post_code,
                'city' => $request->city,
                'country' => $request->country,
                'notes' => $request->notes,
                'payment_option' => $request->payment_option,
                'sub_total' => $request->sub_total,
                'total' => $request->total,
                'created_at' => Carbon::now()
            ]);

            // Order list insert start
            $carts = Cart::where('ip_address',request()->ip())->get();
            foreach ($carts as $cart) {

                Order_list::insert([
                    'user_id' => Auth::id(),
                    'order_id' => $order_id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'created_at' => Carbon::now()
                ]);
                Product::find($cart->product_id)->decrement('product_quantity',$cart->quantity);
                Cart::find($cart->id)->delete();
            }

            $notification=array(
                'messege'=>'Your Order Done',
                'alert-type'=>'success'
            );
            return Redirect('/')->with($notification);

        }else{

            return Redirect('stripe')->with('total',$request->total);

        }





    }



}
