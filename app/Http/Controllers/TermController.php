<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Term;

class TermController extends Controller
{
    public function __construct()
    {
		$this->term = new Term();
    }
    public function index()
    {
		return view('terms/list');
    }
    public function add()
    {
		return view('terms/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('terms/view');
    }
    public function edit($id)
    {
		return view('terms/edit');
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
