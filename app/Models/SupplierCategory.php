<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCategory extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $attributes = [
        'suppliercategory_Code' => '',
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
