<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id','first_name','last_name', 'birthday','gender','street_adress','city',
                            'state','postal_code','country','locale',''];
    public function user()
    {
       return $this->belongsTo(User::class,'user_id','id');
    }
}
