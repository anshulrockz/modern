<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Brand;

class BrandController extends Controller
{
     public function index()
    {
    	$brand = Brand::all();
		return view('brandes.list')->with('brand',$brand);
    }
    
    public function create()
    {
		return view('brandes.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$brand = new brand;
    	$brand->name=$request->name;
    	$brand->description=$request->description;
    	$brand->created_by=Auth::id();
    	$brand->updated_by=Auth::id();
    	$brand->is_active=1;
    	$result= $brand->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$brand = Brand::find($id);
		return view('brandes.view')->with('brand',$brand);
    }
    
    public function edit($id)
    {
    	$brand = Brand::find($id);
		return view('brandes/edit')->with('brand',$brand);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$brand = Brand::find($id);
    	$brand->name=$request->name;
    	$brand->description=$request->description;
    	$brand->updated_by=1;
    	$result = $brand->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Brand::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
