<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, 
     */
    // public function rules(): array
    // {
       
    //         return [
    //             'title' => 'required|min:3|max:255',
    //             'slug' => 'required|min:3|max:255|unique:posts',
    //             'status' => 'required|in:0,1',
    //             'category_id' => 'required|exists:categories,id',
    //             'subCategory_id' => 'required|exists:sub_categories,id',
    //             'description' => 'required',
    //             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
    //             'tag_ids' => 'required|array|min:1',
                
    //         ];
       
    // }
}
