<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    public $incrementing=false;
    protected $fillable=['cookie_id','user_id','product_id','quantity','options'];

    protected static function booted(){
        static::creating(function(Cart $cart){
               $cart->id=Str::uuid();
        });
    }

    public function user(){

        return $this->belongsTo(User::class)->withDefault(['name'=>'Anonymous']);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
