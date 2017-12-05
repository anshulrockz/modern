<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Unit;

class UnitController extends Controller
{
    public function index()
    {
    	$unit = Unit::all();
		return view('units.list')->with('unit',$unit);
    }
    
    public function create()
    {
		return view('units.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$unit = new Unit;
    	$unit->name=$request->name;
    	$unit->description=$request->description;
    	$unit->created_by=Auth::id();
    	$unit->updated_by=Auth::id();
    	$unit->is_active=1;
    	$result= $unit->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$unit = Unit::find($id);
		return view('units.view')->with('unit',$unit);
    }
    
    public function edit($id)
    {
    	$unit = Unit::find($id);
		return view('units/edit')->with('unit',$unit);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$unit = Unit::find($id);
    	$unit->name=$request->name;
    	$unit->description=$request->description;
    	$unit->updated_by=1;
    	$result = $unit->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Unit::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
