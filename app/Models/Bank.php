<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $attributes = [
        'bank_code' => '',
        'detail' => '',
    ];
    public function coas()
    {
        return $this->hasMany(Coa::class, 'id');
    }
    public function buyer()
    {
        return $this->hasMany(buyer::class, 'buyer_id');
    }
}

