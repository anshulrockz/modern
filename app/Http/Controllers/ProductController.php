<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Product;

class ProductController extends Controller
{
     public function index()
    {
    	$product = Product::all();
		return view('productes.list')->with('product',$product);
    }
    
    public function create()
    {
		return view('productes.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$product = new product;
    	$product->name=$request->name;
    	$product->description=$request->description;
    	$product->created_by=Auth::id();
    	$product->updated_by=Auth::id();
    	$product->is_active=1;
    	$result= $product->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$product = Product::find($id);
		return view('productes.view')->with('product',$product);
    }
    
    public function edit($id)
    {
    	$product = Product::find($id);
		return view('productes/edit')->with('product',$product);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$product = Product::find($id);
    	$product->name=$request->name;
    	$product->description=$request->description;
    	$product->updated_by=1;
    	$result = $product->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Product::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
