<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_inventory extends Model
{
    use HasFactory;
    function relationTocolor()
    {
       return $this->hasOne(Color_variation::class,'id','color_id');
    }
    function relationTosize()
    {
       return $this->hasOne(Size_variation::class,'id','size_id');
    }
}
