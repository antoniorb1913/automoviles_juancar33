<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    protected $fillable = [
        'status', 
        'amount', 
        'sale_date', 
        'seller_id',
        'client_id',
        'car_id'
    ];
    protected $hidden = ['updated_at','created_at'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

}
