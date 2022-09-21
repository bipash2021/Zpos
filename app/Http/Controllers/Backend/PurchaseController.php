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
use count;
use DB;


class PurchaseController extends Controller
{
    public function view(){ 

   $data['alldata']=Purchase::all();
   return view('backend.purchases.view_purchase',$data);
     }

    public function add(){

        $data['suppliers']=Supplier::all();
        $data['categories']=Category::all();
        $data['purchases']=Purchase::all();
        $data['products']=Product::all();
    	
    	return view('backend.purchases.add_purchase',$data);
    }

    public function store(Request $request){



    	if($request->category_id == null){
        return redirect()->back()->with('errors','Sorry! You do not select any item');

        }

        else

        {

            $count_category = count($request->category_id);
            for ($i=0; $i< $count_category ; $i++) { 
                $purchase=new Purchase();
                $purchase->category_id=$request->category_id[$i];
                $purchase->date=date('Y-m-d',strtotime($request->date[$i]));


                $purchase->purchase_no=$request->purchase_no[$i];
                $purchase->supplier_id=$request->supplier_id[$i];
                $purchase->product_id=$request->product_id[$i];
                $purchase->buying_qty=$request->buying_qty[$i];
                $purchase->unit_price=$request->unit_price[$i];
                $purchase->buying_price=$request->buying_price[$i];
                $purchase->description=$request->description[$i];
                $purchase->created_by=Auth::user()->id;
                $purchase->status='0';
                $purchase->save();

        

            

    	return redirect()->route('purchases.view')->with('success','Data Save Successfully');	

    	
    	
    	}
    }
}

    public function edit($id){

        $data['editdata']=Purchase::find($id);
    	$data['suppliers']=Supplier::all();
        $data['categories']=Category::all();
        
        $data['units']=Unit::all();
    	
    	return view('backend.purchases.edit_purchase',$data);
    }


    public function update(Request $request, $id){
    	       $this->validate($request,[
            'name'=>'required',
            

        ]);
        
        $purchase=Purchase::find($id);
        $purchase->supplier_id=$request->supplier_id;
        $purchase->category_id=$request->category_id;
        $purchase->unit_id=$request->unit_id;
        $purchase->name=$request->name;
        $purchase->quantity='0';
        
        $purchase->updated_by=Auth::user()->id;
        $purchase->save();

    return redirect()->route('purchases.view')->with('success','purchases added successfully');

    }


    public function delete($id){
    $purchase=Purchase::find($id);
    $purchase->delete();

    return redirect()->back()->with('success','purchases deleted successfully');

    }
}
