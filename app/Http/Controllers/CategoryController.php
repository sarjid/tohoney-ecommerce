<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Image;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   public function Allcat(){

    // $categories = Category::latest()->paginate();
    // $categories = DB::table('categories')->join('users','categories.user_id','users.id')->select('categories.*','users.name')->paginate(4);
    // This with user is join relatin ship one two one
     $categories = Category::with('user')->latest()->paginate(5);

    //  trash category show
    $trashcat = Category::onlyTrashed()->get();


    return view('admin.category.index',compact('categories','trashcat'));

   }

//    show category form
     public function showCat(){
         return view('admin.category.addcat');

            }

    //    add category
    public function AddCat(Request $request){
            $validataedata = $request->validate([
                'category_name' => 'required|min:4|max:30',


            ],
        [
            'category_name.required' => 'input Category name',
            'category_name.min' => 'cateogory longer then 4 Characters',
            'category_name.max' => 'Categoy Must Be less then 30 chars'
        ]);

    //    $category_id = Category::insertGetId([
    //        'category_name' => $request->category_name,
    //        'user_id' => Auth::user()->id,
    //        'category_photo' => $request->category_name,
    //        'created_at' => Carbon::now()
    //    ]);


    // //    photo
    //     $uploaded_photo = $request->file('category_photo');
    //     $new_name = $category_id.".".$uploaded_photo->getClientOriginalExtension();
    //     $new_upload_locaton = base_path('public/uploads/category_photo/'.$new_name);
    //     Image::make($uploaded_photo)->save($new_upload_locaton,50);


    //     Category::find($category_id)->update([
    //         'category_photo' => $new_name

    //     ]);


    $category = new Category();
    $category->category_name = $request->category_name;
    $category->user_id = Auth::user()->id;
    $category->created_at = Carbon::now();
    $image = $request->file('category_photo');
    $image_name= substr(md5(time()), 0, 10);

    $ext=strtolower($image->getClientOriginalExtension());
    $image_full_name=$image_name.'.'.$ext;
    $upload_path='public/uploads/category_photo/';
    $image_url=$upload_path.$image_full_name;
    $success=$image->move($upload_path,$image_full_name);
    $category->category_photo = $image_url;
    $category->save();
    $notification=array(
        'messege'=>'Successfully Added',
        'alert-type'=>'success'
    );
    return Redirect()->route('all.category')->with($notification);



}



    // }


    // Edit Category

    public function EditCat($id){
        $category = Category::find($id);
        return view('admin.category.editcat',compact('category'));
    }


    // update Category

    public function UpdateCat(Request $request,$id){

         Category::find($id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('all.category')->with('successupdate','Successfully Category Updated');


    }

    // Softdeltes

    public function SoftDel($id){
        Category::find($id)->delete();

        $notification=array(
            'messege'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);


    }

    // Restore data
    public function Restoredata($id){
        $restore = Category::withTrashed()->find($id)->restore();

        return Redirect()->route('all.category')->with('Restore','Successfully Category Restore');
    }


    public function HardDelete($id){

        $hardDelete = Category::onlyTrashed()->find($id)->forceDelete();
        $notification=array(
            'messege'=>'Permanently Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);
    }





}
