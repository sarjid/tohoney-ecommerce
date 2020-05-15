<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FaqController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){
       $faqs = Faq::all();
       return view('admin.faq.index',compact('faqs'));

   }

    //    store
    public function Store(Request $request){

        $request->validate([
            'question' => 'required',
            'answer' => 'required',

        ]);


    $faq = Faq::insert([

        'question' => $request->question,
        'answer' => $request->answer,
        'created_at' => Carbon::now()

    ]);

    if ($faq) {
        $notification=array(
            'messege'=>'FaQ Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



    }
}
