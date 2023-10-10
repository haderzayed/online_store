<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['id','name','image','description','status','slug','category_id','store_id'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function store()
    {
        return $this->hasOne(Store::class,'id','store_id');
    }
}
