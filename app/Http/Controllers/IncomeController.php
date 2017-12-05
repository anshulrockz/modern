<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Income;

class IncomeController extends Controller
{
     public function index()
    {
    	$income = Income::all();
		return view('incomees.list')->with('income',$income);
    }
    
    public function create()
    {
		return view('incomees.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$income = new income;
    	$income->name=$request->name;
    	$income->description=$request->description;
    	$income->created_by=Auth::id();
    	$income->updated_by=Auth::id();
    	$income->is_active=1;
    	$result= $income->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$income = Income::find($id);
		return view('incomees.view')->with('income',$income);
    }
    
    public function edit($id)
    {
    	$income = Income::find($id);
		return view('incomees/edit')->with('income',$income);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$income = Income::find($id);
    	$income->name=$request->name;
    	$income->description=$request->description;
    	$income->updated_by=1;
    	$result = $income->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Income::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
