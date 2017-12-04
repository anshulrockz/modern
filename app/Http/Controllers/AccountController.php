<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Account;

class AccountController extends Controller
{
    public function __construct()
    {
		$this->account = new Account();
    }
    public function index()
    {
		return view('accounts/list');
    }
    public function add()
    {
		return view('accounts/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('accounts/view');
    }
    public function edit($id)
    {
		return view('accounts/edit');
    }
    public function update(Request $request,$id)
    {
		return redirect()->back();
    }
    public function delete($id)
    {
		return redirect()->back();
    }
}
