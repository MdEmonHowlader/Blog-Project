<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categroy;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategorys = SubCategory::with('category')->orderBy('order_by')->get();
        return view('Admin.modules.subCategory.index', compact('subCategorys'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categroy::pluck('name', 'id');

        return view('Admin.modules.subCategory.subCategroy', compact('categories'));
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
            'category_id' => 'required',
        ]);

        $subCategroy_data = $request->all();
        $subCategroy_data['slug'] = Str::slug($request->input('slug'));
        SubCategory::create($subCategroy_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'SubCategroy Created Successfully');

        return redirect()->route('subCategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subCategroy = SubCategory::findOrFail($id);

        return view('Admin.modules.subCategory.show', compact('subCategroy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Categroy::pluck('name', 'id');

        return view('Admin.modules.subCategory.edit', compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
            'order_by' => 'required|numeric',
            'status' => 'required|in:0,1',
            'category_id' => 'required',
        ]);

        $subCategroy_data = $request->all();
        $subCategroy_data['slug'] = Str::slug($request->input('slug'));
        SubCategory::create($subCategroy_data);
        session()->flash('cls', 'success');
        session()->flash('msg', 'SubCategroy Update Successfully');

        return redirect()->route('subCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        session()->flash('cls', 'danger');
        session()->flash('msg', 'Category Delete Successfully');

        return redirect()->route('subCategory.index');

    }

    public function getSubCategoryByCategoryId(int $id){
        $subCategory=SubCategory::select('id', 'name')->where('status',1)->where('category_id', $id)->get();
        return response()->json($subCategory);

    }
}
