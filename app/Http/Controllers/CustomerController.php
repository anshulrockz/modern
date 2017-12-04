<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
		$this->customer = new Customer();
    }
    public function index()
    {
		return view('customers/list');
    }
    public function add()
    {
		return view('customers/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('customers/view');
    }
    public function edit($id)
    {
		return view('customers/edit');
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
