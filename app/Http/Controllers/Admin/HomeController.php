<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeNewMail;

use Carbon\Carbon;

class HomeController extends Controller
{
    //Admin Homepage
    public function index() {

        $name = Auth::user()->name;
        $date_time = Carbon::now()->format('h:i A');

        //Welcome email
        Mail::to( Auth::user()->email )->send( new WelcomeNewMail($name, $date_time) );

        return view('admin.home');
    }
}
