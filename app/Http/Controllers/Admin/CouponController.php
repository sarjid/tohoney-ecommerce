<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // index
    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }


     // Store
     public function Store(Request $request){
        $request->validate([
            'coupon_name' => 'required|unique:coupons,coupon_name',
            'discount_amount' => 'required|numeric|min:1|max:99',
            'validity_till' => 'required',

        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'discount_amount' => $request->discount_amount,
            'validity_till' => $request->validity_till,
            'created_at' => Carbon::now()

        ]);

        $notification=array(
            'messege'=>'Successfully Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    // delete

    public function Delete($id){
        $delete = Coupon::find($id)->delete();

        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Delted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }
    }

      // edit

      public function Edit($id){
        $coupons = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupons'));

    }

     // Update
     public function Update(Request $request,$id){
        $request->validate([
            'coupon_name' => 'required',
            'discount_amount' => 'required|numeric|min:1|max:99',
            'validity_till' => 'required',

        ]);

        $coupon = Coupon::find($id);
        $name = $coupon->coupon_name;

        if($name == $request->coupon_name){
            Coupon::find($id)->update([
                'coupon_name' => strtoupper($request->coupon_name),
                'discount_amount' => $request->discount_amount,
                'validity_till' => $request->validity_till,
                'created_at' => Carbon::now()
    
            ]);
    
            $notification=array(
                'messege'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('product.coupon')->with($notification);

        }else{
            $request->validate([
                'coupon_name' => 'unique:coupons,coupon_name'  
            ]);
        }

        

    }


}
