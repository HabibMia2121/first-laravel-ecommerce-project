<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    function relationToproduct_item()
    {
       return $this->hasOne(product_item::class,'id','product_id');
    }

    function relationTocolor()
    {
       return $this->hasOne(Color_variation::class,'id','color_id');
    }
    function relationTosize()
    {
       return $this->hasOne(Size_variation::class,'id','size_id');
    }
}
