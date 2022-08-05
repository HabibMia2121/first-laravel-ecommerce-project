<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_item extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    function relationTocategory_product()
    {
       return $this->hasOne(Category_product::class,'id','category_id');
    }
    function relationTosubcategory_product()
    {
       return $this->hasOne(Subcategory_product::class,'id','subcategory_id');
    }
}
