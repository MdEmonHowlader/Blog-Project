<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('Admin.modules.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.modules.tag.tag');
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

        $tag_data = $request->all();
        $tag_data['slug'] = Str::slug($request->input('slug'));
        Tag::create($tag_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'Tag Created Successfully');

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        return view('Admin.modules.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('Admin.modules.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
            'order_by' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);
        $tag_data = $request->all();
        $tag_data['slug'] = Str::slug($request->input('slug'));
        Tag::create($tag_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'Tag Created Successfully');

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('cls', 'danger');
        session()->flash('msg', 'Tag Delete Successfully');

        return redirect()->route('tag.index');
    }
}
