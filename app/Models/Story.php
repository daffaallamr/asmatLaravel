<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    // admin_id
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
