<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'license', 
        'model', 
        'brand', 
        'used'
    ];
    protected $hidden = ['updated_at','created_at'];
}
