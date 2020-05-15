<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Customer_registerController extends Controller
{
    public function RegisterForm(){
        return view('pages.register');
    }


    // store register
    public function Register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);

        if ($request->password === $request->confirm_password) {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2,
                'created_at' => Carbon::now()
            ]);

            $notification=array(
                'messege'=>'Registration Success Now Login',
                'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);

        }else{
            return Redirect()->back()->with('error','New Password And Confirm Password Not Match');

        }


    }
}
