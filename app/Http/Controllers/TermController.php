<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Term;

class TermController extends Controller
{
     public function index()
    {
    	$term = Term::all();
		return view('terms.list')->with('term',$term);
    }
    
    public function create()
    {
		return view('terms.add');
    }
    
    public function store(Request $request)
    {
//    	$this->validate($request, [
//        	'name'=>'required'
//        ]);
		try{
			$term = array();
	    	foreach ($request->term as $statement) {
		        $term = new term;
		    	$term->term=$statement;
		    	$term->created_by=Auth::id();
		    	$term->updated_by=Auth::id();
		    	$term->is_active=1;
		    	$term->save();
		    }
		    return back()->with('success', 'Record added successfully!');
		}
		catch(\Exception $e){
			$error = $e->errorInfo[1];
	        return back()->with('error', 'Something went wrong! (error code:'.$error.')');
		}
    }
    
    public function show($id)
    {
    	$term = Term::find($id);
		return view('terms.view')->with('term',$term);
    }
    
    public function edit($id)
    {
    	$term = Term::find($id);
		return view('terms.edit')->with('term',$term);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name'=>'required',
        ]);
        
    	$term = Term::find($id);
    	$term->name=$request->name;
    	$term->description=$request->description;
    	$term->updated_by=1;
    	$result = $term->save();
    	
		if($result){
			return back()->with('success', 'Record updated successfully!');
		}
		else{
			return back()->with('error', 'Something went wrong!');
		}
    }
    
    public function destroy($id)
    {
    	$result = Term::find($id)->delete();
        
		if($result){
			return back()->with('success','Record deleted successfully!');
		}
		else{
			return back()->with('error','Something went wrong!');
		}
    }
}
