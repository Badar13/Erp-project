<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany(Coa::class, 'parentid');
    }

    public function accoutcategory()
    {
        return $this->belongsTo(Accountcategory::class, 'accountcategory_id');
    }

    public function mainheadlevel()
    {
        return $this->belongsTo(Coamainheadlevel::class, 'mainheadlevel_id');
    }

    public function vouchertypes()
    {
        return $this->hasMany(Vouchertype::class, 'vouchertype_id');
    }
    public function evoucher()
    {
        return $this->hasMany(Voucherentires::class,'ventry_id');
    }
    public function closingyear()
    {
        return $this->hasMany(YearClosing::class,'yclosing_id');
    }
}
