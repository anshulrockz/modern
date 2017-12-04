<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Bank;

class BankController extends Controller
{
    public function __construct()
    {
		$this->bank = new Bank();
    }
    public function index()
    {
		return view('banks/list');
    }
    public function add()
    {
		return view('banks/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('banks/view');
    }
    public function edit($id)
    {
		return view('banks/edit');
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
