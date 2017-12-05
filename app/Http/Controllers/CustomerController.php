<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Customer;

class CustomerController extends Controller
{
     public function index()
    {
    	$customer = Customer::all();
		return view('customeres.list')->with('customer',$customer);
    }
    
    public function create()
    {
		return view('customeres.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$customer = new customer;
    	$customer->name=$request->name;
    	$customer->description=$request->description;
    	$customer->created_by=Auth::id();
    	$customer->updated_by=Auth::id();
    	$customer->is_active=1;
    	$result= $customer->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$customer = Customer::find($id);
		return view('customeres.view')->with('customer',$customer);
    }
    
    public function edit($id)
    {
    	$customer = Customer::find($id);
		return view('customeres/edit')->with('customer',$customer);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$customer = Customer::find($id);
    	$customer->name=$request->name;
    	$customer->description=$request->description;
    	$customer->updated_by=1;
    	$result = $customer->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Customer::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
