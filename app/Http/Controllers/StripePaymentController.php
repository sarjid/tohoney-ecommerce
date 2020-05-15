<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;


class StripePaymentController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from Tohany.com"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
