<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Income;

class IncomeController extends Controller
{
    public function __construct()
    {
		$this->income = new Income();
    }
    public function index()
    {
		return view('incomes/list');
    }
    public function add()
    {
		return view('incomes/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('incomes/view');
    }
    public function edit($id)
    {
		return view('incomes/edit');
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
