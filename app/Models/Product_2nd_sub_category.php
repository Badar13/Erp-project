<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_2nd_sub_category extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ];
    protected $attributes=[
        'product2ndsbctgry_code' => '',
        'detail' => '',
    ];
}
