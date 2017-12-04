<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
		$this->expense = new Expense();
    }
    public function index()
    {
		return view('expenses/list');
    }
    public function add()
    {
		return view('expenses/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('expenses/view');
    }
    public function edit($id)
    {
		return view('expenses/edit');
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
