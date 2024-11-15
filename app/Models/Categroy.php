<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categroy extends Model
{
    use HasFactory;
    protected $table = 'categories'; 

    protected $guarded = [];
    public function subcategory(){
        return $this->hasMany(SubCategory::class);
        

    }
}
