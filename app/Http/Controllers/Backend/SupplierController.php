<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;

class SupplierController extends Controller
{
    public function view(){
    	$data['alldata']=Supplier::all();
    	return view('backend.suppliers.view_supplier',$data);
    }

    public function add(){
    	
    	return view('backend.suppliers.add_supplier');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required',
    		'mobile_no'=>'required',
    		'address'=>'required',

    	]);
    	
    	$supplier=new Supplier();
    	$supplier->name=$request->name;
    	$supplier->email=$request->email;
    	$supplier->mobile_no=$request->mobile_no;
    	$supplier->address=$request->address;
    	$supplier->created_by=Auth::user()->id;
    	$supplier->save();

    return redirect()->route('suppliers.add')->with('success','suppliers added successfully');

    }

    public function edit($id){
    	$data['editdata']=Supplier::find($id);
    	
    	return view('backend.suppliers.edit_supplier',$data);
    }


    public function update(Request $request, $id){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required',
    		'mobile_no'=>'required',
    		'address'=>'required',

    	]);
    	
    	$supplier=Supplier::find($id);
    	$supplier->name=$request->name;
    	$supplier->email=$request->email;
    	$supplier->mobile_no=$request->mobile_no;
    	$supplier->address=$request->address;
    	$supplier->updated_by=Auth::user()->id;
    	$supplier->save();

    return redirect()->route('suppliers.add')->with('success','suppliers updated successfully');

    }


    public function delete($id){
    $supplier=Supplier::find($id);
    $supplier->delete();

    return redirect()->back()->with('success','suppliers deleted successfully');

    }

}
