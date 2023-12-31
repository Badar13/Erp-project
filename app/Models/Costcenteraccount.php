<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costcenteraccount extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function children()
    {
        return $this->hasMany(Coa::class, 'parentid');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'depart_id');
    }
    
}
