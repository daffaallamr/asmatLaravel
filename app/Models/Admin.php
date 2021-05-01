<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use HasFactory;

    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'nama', 'username', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}
