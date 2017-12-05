<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Bank;

class BankController extends Controller
{
    public function index()
    {
    	$bank = Bank::all();
		return view('bankes.list')->with('bank',$bank);
    }
    
    public function create()
    {
		return view('bankes.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$bank = new bank;
    	$bank->name=$request->name;
    	$bank->description=$request->description;
    	$bank->created_by=Auth::id();
    	$bank->updated_by=Auth::id();
    	$bank->is_active=1;
    	$result= $bank->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$bank = Bank::find($id);
		return view('bankes.view')->with('bank',$bank);
    }
    
    public function edit($id)
    {
    	$bank = Bank::find($id);
		return view('bankes/edit')->with('bank',$bank);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$bank = Bank::find($id);
    	$bank->name=$request->name;
    	$bank->description=$request->description;
    	$bank->updated_by=1;
    	$result = $bank->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Bank::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
