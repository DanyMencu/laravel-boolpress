<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Contact;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    //Save contact on db and notify with email
    public function store(Request $request) {
        //Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $data = $request->all();

        //Save in db
        $new_contact = new Contact();
        $new_contact->fill($data);
        $new_contact->save();

        //Send email
        Mail::to('admin@library.com')->send( new ContactMessageMail($data) );

        return response()->json($data);
    }
}
