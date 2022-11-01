<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Category;
use App\Models\Unit;
use Auth;


class DefaultController extends Controller
{
    public function getCategory(Request $request){


     $supplier_id=$request->supplier_id;


      $allcategory=Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
      return response()->json($allcategory);

    }


    public function getProduct(Request $request){


     $category_id=$request->category_id;


      $allproduct=Product::where('category_id',$category_id)->get();
      return response()->json($allproduct);

    }

    public function getStock(Request $request){


     $product_id=$request->product_id;


    $stock=Product::where('id',$product_id)->first()->quantity;
      return response()->json($stock);

    }
}
