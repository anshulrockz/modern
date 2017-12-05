<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
    	$expenses = Expenses::all();
		return view('expenseses.list')->with('expenses',$expenses);
    }
    
    public function create()
    {
		return view('expenseses.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$expenses = new expenses;
    	$expenses->name=$request->name;
    	$expenses->description=$request->description;
    	$expenses->created_by=Auth::id();
    	$expenses->updated_by=Auth::id();
    	$expenses->is_active=1;
    	$result= $expenses->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$expenses = Expenses::find($id);
		return view('expenseses.view')->with('expenses',$expenses);
    }
    
    public function edit($id)
    {
    	$expenses = Expenses::find($id);
		return view('expenseses/edit')->with('expenses',$expenses);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$expenses = Expenses::find($id);
    	$expenses->name=$request->name;
    	$expenses->description=$request->description;
    	$expenses->updated_by=1;
    	$result = $expenses->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Expenses::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
