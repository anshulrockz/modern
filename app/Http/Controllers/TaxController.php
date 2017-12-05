<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Tax;

class TaxController extends Controller
{
    public function index()
    {
    	$tax = Tax::all();
		return view('taxes.list')->with('tax',$tax);
    }
    
    public function create()
    {
		return view('taxes.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$tax = new tax;
    	$tax->name=$request->name;
    	$tax->description=$request->description;
    	$tax->created_by=Auth::id();
    	$tax->updated_by=Auth::id();
    	$tax->is_active=1;
    	$result= $tax->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$tax = Tax::find($id);
		return view('taxes.view')->with('tax',$tax);
    }
    
    public function edit($id)
    {
    	$tax = Tax::find($id);
		return view('taxes/edit')->with('tax',$tax);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$tax = Tax::find($id);
    	$tax->name=$request->name;
    	$tax->description=$request->description;
    	$tax->updated_by=1;
    	$result = $tax->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Tax::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
