<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class ContactController extends Controller
{

    // send msg
    public function SendMsg(Request $request){
        $validataedata = $request->validate([
            'name' => 'required|min:4|max:30',
            'email' => 'required|email',
            'subject' => 'required|min:4|max:150',
            'message' => 'required|min:4',
        ],
        [
        'name.required' => 'Input Your name',
        'email.required' => 'Input Your Email',
        'email.email' => 'Invalid Email',
        'subject.required' => 'Input Subject Name',
        'message.required' => 'Type Your Message',

        ]);

        $contact = Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);

        // $contact = new Contact;
        // $contact->name = $request->name;
        // $contact->email = $request->email;
        // $contact->subject = $request->subject;
        // $contact->message = $request->message;
        // $contact->created_at = Carbon::now();
        // $contact->save();

            if ($contact) {
                $notification=array(
                    'messege'=>'Successfully Send Message',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }

        }



    }




