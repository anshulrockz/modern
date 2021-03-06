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
    	try{
    		$unit = Unit::all();
			return view('units.list')->with('unit',$unit);
		}
		catch(\Exception $e){
	        return back()->with('error', 'Something went wrong! Please Contact Your Admin');
		}   
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
        try{
	        $result= $unit->save();
	        return back()->with('success', 'Record added successfully!');
	    }
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
	    }
    }
    
    public function show($id)
    {
    	try{
	        $unit = Unit::find($id);
			return view('units.view')->with('unit',$unit);
	    }
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! Please Contact Your Admin');
	    }
    	
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
    	$unit->updated_by=Auth::id();
    	try{
	        $result= $unit->save();
	        return back()->with('success', 'Record added successfully!');
	    }
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
	    }
    }
    
    public function destroy($id)
    {
    	try{
    		$result = Unit::find($id)->delete();
    		return back()->with('success','Record deleted successfully!');
		}
		catch(\Exception $e){
			return back()->with('error', 'Something went wrong! (error code:'.$error.')');
		}
	}
	
}
