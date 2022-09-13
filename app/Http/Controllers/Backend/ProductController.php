<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Auth;

class ProductController extends Controller
{
     public function view(){
        
    	$data['alldata']=Product::all();
    	return view('backend.products.view_product',$data);
    }

    public function add(){

        $data['suppliers']=Supplier::all();
        $data['categories']=Category::all();
        $data['products']=Product::all();
        $data['units']=Unit::all();
    	
    	return view('backend.products.add_product',$data);
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		

    	]);
    	
    	$product=new Product();
    	$product->supplier_id=$request->supplier_id;
        $product->category_id=$request->category_id;
        $product->unit_id=$request->unit_id;
        $product->name=$request->name;
    	$product->quantity='0';
    	
    	$product->created_by=Auth::user()->id;
    	$product->save();

    return redirect()->route('products.view')->with('success','products added successfully');

    }

    public function edit($id){

        $data['editdata']=Product::find($id);
    	$data['suppliers']=Supplier::all();
        $data['categories']=Category::all();
        
        $data['units']=Unit::all();
    	
    	return view('backend.products.edit_product',$data);
    }


    public function update(Request $request, $id){
    	       $this->validate($request,[
            'name'=>'required',
            

        ]);
        
        $product=Product::find($id);
        $product->supplier_id=$request->supplier_id;
        $product->category_id=$request->category_id;
        $product->unit_id=$request->unit_id;
        $product->name=$request->name;
        $product->quantity='0';
        
        $product->updated_by=Auth::user()->id;
        $product->save();

    return redirect()->route('products.view')->with('success','products added successfully');

    }


    public function delete($id){
    $product=Product::find($id);
    $product->delete();

    return redirect()->back()->with('success','products deleted successfully');

    }
}
