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
    	try{
    		$this->validate($request, [
	        	'name'=>'required',
	        	'gst'=>'required',
	        	'hsn_code'=>'required',
	        	'pan'=>'required',
	        	'itc'=>'required',
	        ]);
	    	
	    	$account = new Account;
	    	$account->name=$request->name;
	    	$account->gst=$request->gst;
	    	$account->hsn_code=$request->hsn_code;
	    	$account->parent_account_number=$request->pan;
	    	$account->itc_eligibility=$request->itc;
	    	$account->created_by=Auth::id();
	    	$account->updated_by=Auth::id();
	    	$account->is_active=1;
	    	$result= $account->save();
	    	return back()->with('success', 'Record added successfully!');
		}
		catch(\Exception $e){
			$error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
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
    	try{
    		$this->validate($request, [
	        	'name'=>'required',
	        	'gst'=>'required',
	        	'hsn_code'=>'required',
	        	'pan'=>'required',
	        	'itc'=>'required',
	        ]);
	        
	    	$account = Account::find($id);
	    	$account->name=$request->name;
	    	$account->gst=$request->gst;
	    	$account->hsn_code=$request->hsn_code;
	    	$account->parent_account_number=$request->pan;
	    	$account->itc_eligibility=$request->itc;
	    	$account->updated_by=Auth::id();
	    	$result = $account->save();
	    	return back()->with('success', 'Record updated successfully!');
		}
		catch(\Exception $e){
			$error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
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
