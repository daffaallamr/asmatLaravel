<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk',
        'order_id',
        'harga',
        'jumlah_barang',
        'jumlah_harga',       
    ];

    // order_id
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // product_id
    public function product() {
        return $this->belongsTo(Product::class, 'produk_id', 'id');
    }
}
