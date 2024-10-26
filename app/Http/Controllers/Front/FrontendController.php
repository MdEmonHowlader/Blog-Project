<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('Frontend.modules.index');
    }
    public function single(){
        return view('Frontend.modules.single');
    }
    public function About(){
        return view('Frontend.modules.aboute');
    }
    public function Blog(){
        return view('Frontend.modules.blogPage');
    }
    public function Contact(){
        return view('Frontend.modules.contact');
    }
}
