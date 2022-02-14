<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewMail;

class HomeController extends Controller
{
    //Admin Homepage
    public function index() {

        //Welcome email
        Mail::to('fake-account@example.com')->send(new WelcomeNewMail());

        return view('admin.home');
    }
}
