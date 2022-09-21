<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Category;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function unit(){

    return $this->belongsTo(Unit::class,'unit_id','id');
    
    }

    public function product(){

    return $this->belongsTo(Product::class,'product_id','id');
    
    }

    public function supplier(){

    return $this->belongsTo(Supplier::class,'supplier_id','id');
    
    }

    public function category(){

    return $this->belongsTo(Category::class,'category_id','id');
    
    }
}
