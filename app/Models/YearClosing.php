<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearClosing extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function coas()
    {
        return $this->belongsTo(Coa::class,'coa_id');
    }
}
