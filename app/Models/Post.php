<?php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
// {
//     use HasFactory;
//     protected $guarded=[];
   

//     public function category(){
//         return $this->belongsTo(Categroy::class);
//     }
//     public function subcategory(){
//         return $this->belongsTo(SubCategory::class);
//     }
//     public function tag(){
//         return $this->belongsToMany(Tag::class);
//     }
//     public function user(){
//         return $this->belongsTo(User::class);
//     }
  
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'status', 'is_approved', 'category_id', 'subCategory_id', 'user_id', 'description', 'photo', 'admin_comment'];

    public function category()
    {
        return $this->belongsTo(Categroy::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}

