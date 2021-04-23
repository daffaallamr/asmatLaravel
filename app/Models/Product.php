<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // orderDetail_id
    public function orderDetail() {
        return $this->hasOne(OrderDetail::class);
    }
}
