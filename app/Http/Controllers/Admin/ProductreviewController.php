<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Productreview;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductreviewController extends Controller
{
    public function StoreReview(Request $request){



        $validataedata = $request->validate([
            'name' => 'required|min:4|max:30',
            'email' => 'required|email',
            'review' => 'required|min:4|max:255',
            'stars' => 'required',
        ],
        [
        'name.required' => 'Input Your name',
        'email.required' => 'Input Your Email',
        'email.email' => 'Invalid Email',
        'review.required' => 'Type Your Comment',
        'stars.required' => 'Review stars',

        ]);


        $review = Productreview::insert([
            'product_id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->review,
            'stars' => $request->stars,
            'created_at' => Carbon::now()

        ]);

            if ($review) {
                $notification=array(
                    'messege'=>'Review Added Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }


    }
}
