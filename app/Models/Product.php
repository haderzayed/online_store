<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Scopes\StoreScope;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['id','name','image','description','status','slug','category_id','store_id',
                           'price','compare_price'];

    protected static function booted() //working whene using the model
    {
        static::addGlobalScope('store', new StoreScope());

        // static::addGlobalScope('store', function (Builder $builder){
        //     $user=Auth::user();
        //     if( $user->store_id){
        //         $builder->where('store_id', $user->store_id);
        //     }

        // });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
