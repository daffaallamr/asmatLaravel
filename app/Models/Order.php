<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'is_checkout',
        'payment_id',
        'shipper_id',
        'is_paid',
        'ongkir',
        'jumlah_pembayaran',       
        'tanggal_pembayaran'       
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // customer_id
    public function customer() {
        return $this->hasOne(Customer::class);
    }

    // shipper_id
    public function shipper() {
        return $this->hasOne(Shipper::class);
    }

    // payment_id
    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
