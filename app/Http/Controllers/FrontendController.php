<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        \Auth::logout();
        return view('frontend');
    }

    public function cc(){
        return view('backend.components.cc');
    }
}
