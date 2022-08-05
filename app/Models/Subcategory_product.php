<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory_product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    function relationToCategory_product(){
        return $this->hasOne(Category_product::class,'id','category_id');
    }
}
