<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;

class UnitController extends Controller
{
    public function view(){
    	$data['alldata']=Unit::all();
    	return view('backend.units.view_unit',$data);
    }

    public function add(){
    	
    	return view('backend.units.add_unit');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    	
    	]);
    	
    	$unit=new Unit();
    	$unit->name=$request->name;
    	
    	$unit->created_by=Auth::user()->id;
    	$unit->save();

    return redirect()->route('units.add')->with('success','units added successfully');

    }

    public function edit($id){
    	$data['editdata']=Unit::find($id);
    	
    	return view('backend.units.edit_unit',$data);
    }


    public function update(Request $request, $id){
    	$this->validate($request,[
    		'name'=>'required',
    		

    	]);
    	
    	$unit=Unit::find($id);
    	$unit->name=$request->name;
    
    	$unit->updated_by=Auth::user()->id;
    	$unit->save();

    return redirect()->route('units.add')->with('success','units updated successfully');

    }


    public function delete($id){
    $unit=Unit::find($id);
    $unit->delete();

    return redirect()->back()->with('success','units deleted successfully');

    }
}
