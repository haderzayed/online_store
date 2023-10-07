<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=['id','name','image','description','status','slug','parent_id'];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function scopeActive(Builder $builder){

        $builder->where('status','=','active');
    }

    public function scopeFilter(Builder $builder,$filters){

        $builder->when($filters['name'] ?? false,function($builder,$value){
            $builder->where('name','like',"%{$value}%");
        });

        $builder->when($filters['status'] ?? false,function($builder,$value){
            $builder->where('status','=',$value);
        });

    //     if($filters['name'] ?? false){
    //         $builder->where('name','like',"%{$filters['name']}%");
    //     }
    //     if($filters['status'] ?? false ){
    //        $builder->where('status','=',$filters['status']);
    //    }
    }


}
