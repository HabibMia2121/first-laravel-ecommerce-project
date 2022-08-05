<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_summary extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['payment_status'];
    
    function relationTocountry()
    {
       return $this->hasOne(countrie::class,'id','customer_country_id');
    }
}
