<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class CustomerController extends Controller
{
     public function view(){
    	$data['alldata']=Customer::all();
    	return view('backend.customers.view_customer',$data);
    }

    public function add(){
    	
    	return view('backend.customers.add_customer');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required',
    		'mobile_no'=>'required',
    		'address'=>'required',

    	]);
    	
    	$customer=new Customer();
    	$customer->name=$request->name;
    	$customer->email=$request->email;
    	$customer->mobile_no=$request->mobile_no;
    	$customer->address=$request->address;
    	$customer->created_by=Auth::user()->id;
    	$customer->save();

    return redirect()->route('customers.add')->with('success','customers added successfully');

    }

    public function edit($id){
    	$data['editdata']=Customer::find($id);
    	
    	return view('backend.customers.edit_customer',$data);
    }


    public function update(Request $request, $id){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required',
    		'mobile_no'=>'required',
    		'address'=>'required',

    	]);
    	
    	$customer=Customer::find($id);
    	$customer->name=$request->name;
    	$customer->email=$request->email;
    	$customer->mobile_no=$request->mobile_no;
    	$customer->address=$request->address;
    	$customer->updated_by=Auth::user()->id;
    	$customer->save();

    return redirect()->route('customers.add')->with('success','customers updated successfully');

    }


    public function delete($id){
    $customer=Customer::find($id);
    $customer->delete();

    return redirect()->back()->with('success','customers deleted successfully');

    }
}
