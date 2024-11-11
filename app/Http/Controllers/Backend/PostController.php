<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PhotoUploadController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Categroy;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        $categories = Categroy::where('status',1)->pluck('name', 'id');
        // $subCategory = SubCategory::pluck('name', 'id');
        $tags=Tag::where('status',1)->select('name','id')->get();
        return view('Admin.modules.post.post', compact('categories',  'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {       
        $post_data =$request->except(['tag_ids', 'photo', 'slug']);
        $post_data['slug']= Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved']=1;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name=Str::slug($request->input('slug'));
            $height=400;
            $width=1000;
            $thumb_height=150;
            $thumb_width=300;
            $path='image/post/original/';
            $thumb_path='image/post/thumbnail/';
            $photoUpload = new PhotoUploadController();
            $post_data['photo'] = $photoUpload->imageUpload($name, $height, $width, $path, $file);
            $photoUpload->imageUpload($name, $thumb_height, $thumb_width, $thumb_path, $file);
        }
        $post = Post::create($post_data);
        $post->tag()->attach($request->input('tag_ids'));
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $posts=Post::findOrFail($id);
        return view('Admin.modules.post.show', compact('posts'));
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
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
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
