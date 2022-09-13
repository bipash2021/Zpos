<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
    	$data['alldata']=Category::all();
    	return view('backend.categories.view_category',$data);
    }

    public function add(){
    	
    	return view('backend.categories.add_category');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    	
    	]);
    	
    	$category=new Category();
    	$category->name=$request->name;
    	
    	$category->created_by=Auth::user()->id;
    	$category->save();

    return redirect()->route('categories.add')->with('success','categorys added successfully');

    }

    public function edit($id){
    	$data['editdata']=Category::find($id);
    	
    	return view('backend.categories.edit_category',$data);
    }


    public function update(Request $request, $id){
    	$this->validate($request,[
    		'name'=>'required',
    		

    	]);
    	
    	$category=Category::find($id);
    	$category->name=$request->name;
    
    	$category->updated_by=Auth::user()->id;
    	$category->save();

    return redirect()->route('categories.add')->with('success','categorys updated successfully');

    }


    public function delete($id){
    $category=Category::find($id);
    $category->delete();

    return redirect()->back()->with('success','categorys deleted successfully');

}

}
