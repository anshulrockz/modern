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
		return view('products.list')->with('product',$product);
    }
    
    public function create()
    {
		return view('products.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$product = new Product;
    	$product->name=$request->name;
    	$product->category=$request->description;
    	$product->model=$request->model;
    	$product->price=$request->price;
    	$product->unit=$request->unit;
    	$product->brand=$request->brand;
    	$product->manufacturer=$request->manufacturer;
    	$product->pack_size=$request->pack_size;
    	$product->notify_quantity=$request->notify_quantity;
    	$product->created_by=Auth::id();
    	$product->updated_by=Auth::id();
    	$product->is_active=1;
    	
    	try{
	        $result= $product->save();
	        return back()->with('success', 'Record added successfully!');
	    }
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
	    }
    }
    
    public function show($id)
    {	
	    $product = Product::find($id);
		return view('products.view')->with('product',$product);
	}
    
    public function edit($id)
    {
    	try{
	    	$product = Product::find($id);
			return view('products.edit')->with('product',$product);
		}
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
	    }
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
    	
    	try{
	    	$result = $product->save();
	    	return back()->with('success', 'Record updated successfully!');
		}
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
	    }
    }
    
    public function destroy($id)
    {
        try{
	    	$result = Product::find($id)->delete();
	    	return back()->with('success','Record deleted successfully!');
		}
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
	    }
    }
}
