<?php

namespace App\Models;

use App\Mail\PaymentSuccess;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

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
        return $this->hasOne(Customer::class, 'id', 'id');
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
        $this->attributes['is_checkout'] = true;
        $this->save();
    }
    
    public function setStatusSuccess() {
        $this->attributes['status_payment'] = 'success';
        $this->attributes['is_checkout'] = true;
        $this->attributes['tanggal_pembayaran'] = Carbon::now();
        $this->save();
    }
    
    public function setStatusFailed() {
        $this->attributes['status_payment'] = 'failed';
        $this->attributes['is_checkout'] = true;
        $this->save();
    }
    
    public function setStatusExpired() {
        $this->attributes['status_payment'] = 'expired';
        $this->attributes['is_checkout'] = true;
        $this->save();
    }
}
