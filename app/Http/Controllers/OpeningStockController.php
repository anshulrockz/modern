<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\OpeningStock;
use App\Category;
use App\Product;

class OpeningStockController extends Controller
{
     public function index()
    {
    	$openingstock = OpeningStock::all();
		return view('openingstocks.list')->with('openingstock',$openingstock);
    }
    
    public function create()
    {
    	$category=Category::all();
    	$product=Product::all();
		return view('openingstocks.add')->with('category',$category)->with('product',$product);
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'product'=>'required'
        ]);
    	
    	$openingstock = new openingstock;
    	$openingstock->category=$request->category;
    	$openingstock->product=$request->product;
    	$openingstock->barcode=$request->barcode;
    	$openingstock->expiry_date=date_format(date_create($request->expiry_date),"Y-m-d");
    	$openingstock->quantity=$request->quantity;
    	$openingstock->cost=$request->cost;
    	$openingstock->date=date_format(date_create($request->date),"Y-m-d");
    	$openingstock->description=$request->description;
    	$openingstock->created_by=Auth::id();
    	$openingstock->updated_by=Auth::id();
    	$openingstock->is_active=1;
    	$result= $openingstock->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$openingstock = OpeningStock::find($id);
		return view('openingstocks.view')->with('openingstock',$openingstock);
    }
    
    public function edit($id)
    {
    	$openingstock = OpeningStock::find($id);
		return view('openingstocks/edit')->with('openingstock',$openingstock);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        $openingstock = new openingstock;
    	$openingstock->name=$request->name;
    	$openingstock->description=$request->description;
    	$openingstock->updated_by=Auth::id();
    	$result = $openingstock->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = OpeningStock::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
