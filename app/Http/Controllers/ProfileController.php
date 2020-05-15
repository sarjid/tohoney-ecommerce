<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
 use Image;
 use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   public function profile(){
    $id = Auth::user()->id;
    $users = User::find($id);

    return view('admin.user.profile',compact('users'));


   }

   public function UpdateProfile(Request $request){

    $validataedata = $request->validate([
        'name' => 'required|min:4|max:30',
        'email' => 'required|email'
        ],
            [
                'name.required' => 'input Category name',
                'name.min' => 'cateogory longer then 4 Characters',
                'name.max' => 'Categoy Must Be less then 30 chars',
                'email.email' => 'Plese input valid email'
            ]
        );
        $id = Auth::user()->id;
        $update = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return Redirect()->back()->with('success','Your Profile Updated Successfully');

   }

   public function PassChange(){
       return view('admin.user.password');
   }


   public function UpdatePass(Request $request){
    $validataedata = $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8',
        'confirm_password' => 'required|min:8'
        ]);

        $id = Auth::user()->id;
        $password = Auth::user()->password;
        $oldpass = $request->old_password;
        $newpass = $request->new_password;
        $confirm = $request->confirm_password;

        if (Hash::check($oldpass, $password)) {

            if ($newpass === $confirm) {

                User::find($id)->update([

                    'password' => Hash::make($request->new_password)
                ]);
                Auth::logout();
                return Redirect()->route('login')->with('info','Your Password Change Successfully.Please login your New Password');

            }else {

            return Redirect()->back()->with('error','New Password And Confirm Password Not Match');
            }

        }else{

            return Redirect()->back()->with('warning','Old Password Not Match');


        }
   }


//    Image

   public function image(){
       return view('admin.user.uploadimage');
   }

   public function StoreImage(Request $request){
    $validatedData=$request->validate([
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
    ],
    [
        'image.required' => 'Plese Select an Image',
    ]);



    }


}
