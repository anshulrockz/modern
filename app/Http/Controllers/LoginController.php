<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
		if(Auth::check()){
			return redirect('/');
		}
		else{
			return view('login');
		}
    }
    public function login(Request $request)
    {
		$email = $request->input('email');
		$password = $request->input('password');
		$remember = $request->input('remember');
		$this->validate($request,[
			'email'=>'required|email',
			'password'=>'required|min:6'
		]);
		if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect('/');
        }
        else{
        	$request->session()->flash('error', 'Invalid E-mail or Password!');
			return redirect()->back();
		}
    }
    public function logout()
    {
		Auth::logout();
		return redirect('/login');
    }
}
