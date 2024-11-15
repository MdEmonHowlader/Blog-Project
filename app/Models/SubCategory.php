<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories'; 
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Categroy::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'subCategory_id');
    }
}
