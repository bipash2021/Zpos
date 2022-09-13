<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Purchase;

class Purchase extends Model
{
    use HasFactory;

    public function unit(){

    return $this->belongsTo(Unit::class,'unit_id','id');
    
    }

    public function product(){

    return $this->belongsTo(Product::class,'product_id','id');
    
    }
}
