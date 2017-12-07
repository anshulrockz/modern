<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
		$id = Auth::id();
		$profile = User::find($id);//echo $profile; die();
		return view('profiles.profile')->with('profile',$profile);
    }
    
    public function edit()
    {
		$id = Auth::id();
		$profile = User::find($id);//echo $profile; die();
		return view('profiles.edit')->with('profile',$profile);
    }
    
    public function update(Request $request)
    {
		DB::transaction(function () use($request) {
		    $name = $request->input('name');
			$email = $request->input('email');
			$mobile = $request->input('mobile');
			$image = $request->file('image');
			$user_id = Auth::id();
			$updated_at = Carbon::now('Asia/Kolkata');

			$this->validate($request,[
				'name'=>'required',
				'email'=>'required|email',
				'image' => 'image|max:2048'
			]);
			
			if($image){
			    $image_name = 'profile.png';
			    $image->move(public_path('uploads/'.$user_id.md5($name)), $image_name);
			    $res = DB::update('update users set name = ?,email = ?,mobile = ?,thumb = ?,avatar = ?,updated_at = ? where id = ?',[$name,$email,$mobile,$image_name,$image_name,$updated_at,$user_id]);
			}
			else{
				if(is_dir(public_path('uploads/'.$user_id.md5(Auth::user()->name)))){
					rename(public_path('uploads/'.$user_id.md5(Auth::user()->name)),public_path('uploads/'.$user_id.md5($name)));
				}
				$res = DB::update('update users set name = ?,email = ?,mobile = ?,updated_at = ? where id = ?',[$name,$email,$mobile,$updated_at,$user_id]);
			}
			
			if($res){
				$request->session()->flash('success', 'Your Profile has been successfully updated.');
			}
			else{
				$request->session()->flash('error', 'Something went wrong.');
			}

		});
		
    	return back();
    }
}
