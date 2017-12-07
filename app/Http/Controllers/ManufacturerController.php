<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Manufacturer;

class ManufacturerController extends Controller
{
     public function index()
    {
    	$manufacturer = Manufacturer::all();
		return view('manufacturers.list')->with('manufacturer',$manufacturer);
    }
    
    public function create()
    {
		return view('manufacturers.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$manufacturer = new manufacturer;
    	$manufacturer->name=$request->name;
    	$manufacturer->description=$request->description;
    	$manufacturer->created_by=Auth::id();
    	$manufacturer->updated_by=Auth::id();
    	$manufacturer->is_active=1;
    	$result= $manufacturer->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$manufacturer = Manufacturer::find($id);
		return view('manufacturers.view')->with('manufacturer',$manufacturer);
    }
    
    public function edit($id)
    {
    	$manufacturer = Manufacturer::find($id);
		return view('manufacturers/edit')->with('manufacturer',$manufacturer);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$manufacturer = Manufacturer::find($id);
    	$manufacturer->name=$request->name;
    	$manufacturer->description=$request->description;
    	$manufacturer->updated_by=1;
    	$result = $manufacturer->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Manufacturer::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
