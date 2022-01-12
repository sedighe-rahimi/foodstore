<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';

    public function foodType()
    {
        return $this->belongsTo(FoodType::class);
    }

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
