<?php

namespace App\Http\Controllers;

use App\Models\Categroy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategroyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categroy=Categroy::orderBy('order_by')->get();
        $categories = Categroy::all();
        return view('Admin.modules.categroy.index', compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.modules.categroy.categroy');
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

        $categroy_data = $request->all();
        $categroy_data['slug'] = Str::slug($request->input('slug'));
        Categroy::create($categroy_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'Category Created Successfully');
        return redirect()->route('categroy.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Categroy $categroy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categroy $categroy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categroy $categroy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categroy $categroy)
    {
        //
    }
}
