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
    	try{
    		$bank = Bank::all();
			return view('banks.list')->with('bank',$bank);
		}
		catch(\Exception $e){
	        return back()->with('error', 'Something went wrong! Please Contact Your Admin');
		}   
    }
    
    public function create()
    {
		return view('banks.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required',
        	'payee'=>'required',
        	'account_no'=>'required',
        	'ifsc'=>'required',
        	'bank_branch'=>'required'
        ]);
    	
    	$bank = new bank;
    	$bank->name=$request->name;
    	$bank->payee=$request->payee;
    	$bank->account_no=$request->account_no;
    	$bank->ifsc=$request->ifsc;
    	$bank->bank_branch=$request->bank_branch;
    	$bank->created_by=Auth::id();
    	$bank->updated_by=Auth::id();
    	$bank->is_active=1;
    	
    	try{
	        $result= $bank->save();
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
	        $bank = Bank::find($id);
			return view('banks.view')->with('bank',$bank);
		}
	    catch (\Exception $e){
	        $error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! Please Contact Your Admin');
	    }
    }
    
    public function edit($id)
    {
    	$bank = Bank::find($id);
		return view('banks.edit')->with('bank',$bank);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        	'payee'=>'required',
        	'account_no'=>'required',
        	'ifsc'=>'required',
        	'bank_branch'=>'required'
        ]);
        
    	$bank = Bank::find($id);
    	$bank->name=$request->name;
    	$bank->payee=$request->payee;
    	$bank->account_no=$request->account_no;
    	$bank->ifsc=$request->ifsc;
    	$bank->bank_branch=$request->bank_branch;
    	$bank->updated_by=Auth::id();
    	$bank->is_active=1;
    	
    	try{
	        $result= $bank->save();
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
    		$result = Bank::find($id)->delete();
    		return back()->with('success','Record deleted successfully!');
		}
		catch(\Exception $e){
			return back()->with('error', 'Something went wrong! (error code:'.$error.')');
		}
    }
}
