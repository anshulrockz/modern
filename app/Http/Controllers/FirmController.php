<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
use Auth;
use App\Firm;

class FirmController extends Controller
{
     public function index()
    {
    	$firm = Firm::all();
		return view('firms.list')->with('firm',$firm);
    }
    
    public function create()
    {
		return view('firms.add');
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
        	'name' =>'required',
			'email'=>'required|email',
			'logo' => 'image|max:2048'
        ]);
        try{
	    	$firm = new Firm;
	    	$firm->name=$request->name;
	    	$firm->logo=$request->logo;
	    	$firm->email=$request->email;
	    	$firm->mobile=$request->mobile;
	    	$firm->website=$request->website;
	    	$firm->landline=$request->landline;
	    	$firm->state=$request->state;
	    	$firm->city=$request->city;
	    	$firm->address=$request->address;
	    	$firm->pin_code=$request->pin_code;
	    	$firm->pan=$request->pan;
	    	$firm->tan=$request->tan;
	    	$firm->cin=$request->cin;
	    	$firm->gstin=$request->gstin_registration_status;
	    	$firm->gst=$request->gst;
	    	$firm->authorised_signatory=$request->authorised_signatory;
	    	$firm->designation=$request->designation;
	    	$firm->contact_person=$request->contact_person;
	    	$firm->certified=$request->certified;
	    	$firm->created_by=Auth::id();
	    	$firm->updated_by=Auth::id();
	    	$firm->is_active=1;
	    	$result= $firm->save();
	    	$inserted_id = $firm->id;
	    	$image=$request->file('logo');
	        $name=$request->name;
	    	if($image){
			    $image_name = 'logo.png';
			    $image->move(public_path('uploads/firm/'.$inserted_id.md5($name)), $image_name);
			}
			else{
				if(is_dir(public_path('uploads/firm/'.$inserted_id.md5($name)))){
					rename(public_path('uploads/firm/'.$inserted_id.md5($name)),public_path('uploads/'.$inserted_id.md5($name)));
				}
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
    	$firm = Firm::find($id);
		return view('firms.view')->with('firm',$firm);
    }
    
    public function edit($id)
    {
    	$firm = Firm::find($id);
		return view('firms/edit')->with('firm',$firm);;
    }
    
    public function update(Request $request,$id)
    {
    	$this->validate($request, [
        	'name' =>'required',
			'email'=>'required|email',
			'logo' => 'image|max:2048'
        ]);
        try{
    		$firm = Firm::find($id);
    		$firm->name=$request->name;
	    	$firm->logo='logo.png';
	    	$firm->email=$request->email;
	    	$firm->mobile=$request->mobile;
	    	$firm->website=$request->website;
	    	$firm->landline=$request->landline;
	    	$firm->state=$request->state;
	    	$firm->city=$request->city;
	    	$firm->address=$request->address;
	    	$firm->pin_code=$request->pin_code;
	    	$firm->pan=$request->pan;
	    	$firm->tan=$request->tan;
	    	$firm->cin=$request->cin;
	    	$firm->gstin=$request->gstin_registration_status;
	    	$firm->gst=$request->gst;
	    	$firm->authorised_signatory=$request->authorised_signatory;
	    	$firm->designation=$request->designation;
	    	$firm->contact_person=$request->contact_person;
	    	$firm->certified=$request->certified;
	    	$firm->updated_by=Auth::id();
	    	$result = $firm->save();
	    	$image=$request->file('logo');
	        $name=$request->name;
	    	if($image){
			    $image_name = 'logo.png';
			    $image->move(public_path('uploads/firm/'.$id.md5($name)), $image_name);
			}
			else{
				if(is_dir(public_path('uploads/firm/'.$id.md5($name)))){
					rename(public_path('uploads/firm/'.$id.md5($name)),public_path('uploads/'.$id.md5($name)));
				}
			}
			return back()->with('success', 'Record added successfully!');
		}
		catch(\Exception $e){
			return back()->with('error', 'Something went wrong! (error code:'.$error.')');
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
