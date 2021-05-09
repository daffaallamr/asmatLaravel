<?php

namespace App\Models;

use App\Mail\PaymentSuccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Customer extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'nama_depan', 'nama_belakang', 'email', 'telepon', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    public function emailPayment()
    {
        $customer = Customer::findOrFail(Auth('customer')->id());
        Mail::to($customer->email)->send(new PaymentSuccess());
    }
}
