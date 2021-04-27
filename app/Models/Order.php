<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

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

    // midtrans status_payment function
    public function setStatusPending() {
        $this->attributes['status_payment'] = 'pending';
        $this->save();
    }

    public function setStatusSuccess() {
        $this->attributes['status_payment'] = 'sucess';
        $this->save();
    }

    public function setStatusFailed() {
        $this->attributes['status_payment'] = 'failed';
        $this->save();
    }

    public function setStatusExpired() {
        $this->attributes['status_payment'] = 'expired';
        $this->save();
    }
}
