<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shopping extends Model
{
    use HasFactory,SoftDeletes;
    public function relationTocountries()
    {
        return $this->hasOne(Countrie::class,'id','country_id');
    }
}
