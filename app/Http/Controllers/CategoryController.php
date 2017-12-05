<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Category;

class CategoryController extends Controller
{
     public function index()
    {
    	$category = Category::all();
		return view('categories.list')->with('category',$category);
    }
    
    public function create()
    {
		return view('categories.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$category = new category;
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->created_by=Auth::id();
    	$category->updated_by=Auth::id();
    	$category->is_active=1;
    	$result= $category->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$category = Category::find($id);
		return view('categories.view')->with('category',$category);
    }
    
    public function edit($id)
    {
    	$category = Category::find($id);
		return view('categories/edit')->with('category',$category);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$category = Category::find($id);
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->updated_by=1;
    	$result = $category->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Category::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
