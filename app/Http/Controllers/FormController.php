<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Form;

class FormController extends Controller
{
     public function index()
    {
    	$form = Form::all();
		return view('formes.list')->with('form',$form);
    }
    
    public function create()
    {
		return view('formes.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name'=>'required'
        ]);
    	
    	$form = new form;
    	$form->name=$request->name;
    	$form->description=$request->description;
    	$form->created_by=Auth::id();
    	$form->updated_by=Auth::id();
    	$form->is_active=1;
    	$result= $form->save();
    	
		if($result){
			return back()->with('success', 'Record added successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function show($id)
    {
    	$form = Form::find($id);
		return view('formes.view')->with('form',$form);
    }
    
    public function edit($id)
    {
    	$form = Form::find($id);
		return view('formes/edit')->with('form',$form);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$form = Form::find($id);
    	$form->name=$request->name;
    	$form->description=$request->description;
    	$form->updated_by=1;
    	$result = $form->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Form::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
