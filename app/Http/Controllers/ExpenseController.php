<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Expense;
use App\Account;

class ExpenseController extends Controller
{
    public function index()
    {
    	$expense = Expense::all()->account();dd($expense);
		return view('expenses.list')->with('expense',$expense)->with('exaccount',$account)->with('account',$account);
    }
    
    public function create()
    {
    	$account = Account::all();
		return view('expenses.add')->with('exaccount',$account)->with('account',$account);
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'voucher_date'=>'required',
        	'expense_account'=>'required',
        	'expense_amount'=>'required',
        	'paying_account'=>'required',
        	'paying_amount'=>'required',
        	'rcm'=>'required',
        ]);
    	
    	$expense = new expense;
    	$expense->voucher_num=$request->voucher_no;
    	$expense->voucher_date=date_format(date_create($request->voucher_date),"Y-m-d");
    	$expense->voucher_comment=$request->comment1;
    	$expense->expense_account=$request->expense_account;
    	$expense->expense_amount=$request->expense_amount;
    	$expense->expense_comment=$request->comment2;
    	$expense->paying_account=$request->paying_account;
    	$expense->paying_amount=$request->paying_amount;
    	$expense->paying_comment=$request->comment3;
    	$expense->rcm_nature=$request->rcm;
//    	$expense->final_expense_amount=$request->final_expense_amount;
//    	$expense->final_income_amount=$request->final_income_amount;
    	$expense->created_by=Auth::id();
    	$expense->updated_by=Auth::id();
    	$expense->is_active=1;
    	$result= $expense->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$expense = expense::find($id);
		return view('expenses.view')->with('expense',$expense);
    }
    
    public function edit($id)
    {
    	$expense = expense::find($id);
		return view('expenses.edit')->with('expense',$expense);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$expense = expense::find($id);
    	$expense->name=$request->name;
    	$expense->description=$request->description;
    	$expense->updated_by=1;
    	$result = $expense->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = expense::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
