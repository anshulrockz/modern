<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Firm;

class FirmController extends Controller
{
     public function index()
    {
    	$firm = Firm::all();
		return view('firmes.list')->with('firm',$firm);
    }
    
    public function create()
    {
		return view('firmes.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$firm = new firm;
    	$firm->name=$request->name;
    	$firm->description=$request->description;
    	$firm->created_by=Auth::id();
    	$firm->updated_by=Auth::id();
    	$firm->is_active=1;
    	$result= $firm->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$firm = Firm::find($id);
		return view('firmes.view')->with('firm',$firm);
    }
    
    public function edit($id)
    {
    	$firm = Firm::find($id);
		return view('firmes/edit')->with('firm',$firm);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$firm = Firm::find($id);
    	$firm->name=$request->name;
    	$firm->description=$request->description;
    	$firm->updated_by=1;
    	$result = $firm->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Firm::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
