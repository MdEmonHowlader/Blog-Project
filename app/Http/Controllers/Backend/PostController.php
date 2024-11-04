<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('Admin.modules.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.modules.post.post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
            'order_by' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);
        $post_data = $request->all();
        $post_data['slug'] = Str::slug($request->input('slug'));
        Post::create($post_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'Post Created Successfully');
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('Admin.modules.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Admin.modules.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
            'order_by' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);
        $post_data = $request->all();
        $post_data['slug'] = Str::slug($request->input('slug'));
        Post::create($post_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'Post Created Successfully');
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('cls', 'danger');
        session()->flash('msg', 'Post Delete Successfully');
        return redirect()->route('post.index');
    }
}
