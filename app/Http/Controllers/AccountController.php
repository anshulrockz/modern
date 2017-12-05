<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Account;

class AccountController extends Controller
{
    public function index()
    {
    	$account = Account::all();
		return view('accounts.list')->with('account',$account);
    }
    
    public function create()
    {
		return view('accounts.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$account = new account;
    	$account->name=$request->name;
    	$account->description=$request->description;
    	$account->created_by=Auth::id();
    	$account->updated_by=Auth::id();
    	$account->is_active=1;
    	$result= $account->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$account = Account::find($id);
		return view('accounts.view')->with('account',$account);
    }
    
    public function edit($id)
    {
    	$account = Account::find($id);
		return view('accounts/edit')->with('account',$account);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$account = Account::find($id);
    	$account->name=$request->name;
    	$account->description=$request->description;
    	$account->updated_by=1;
    	$result = $account->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Account::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
