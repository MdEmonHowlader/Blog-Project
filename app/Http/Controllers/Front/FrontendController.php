<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class FrontendController extends Controller
{
    public function  index(){
        $posts = Post::with('category', 'tag', 'user')->where('is_approved', 1)->where('status', 1)->latest()->paginate(5);
        
        return view('Frontend.modules.index', compact('posts'));
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
