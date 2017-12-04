<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Tax;

class TaxController extends Controller
{
    public function __construct()
    {
		$this->tax = new Tax();
    }
    public function index()
    {
		return view('taxes/list');
    }
    public function add()
    {
		return view('taxes/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('taxes/view');
    }
    public function edit($id)
    {
		return view('taxes/edit');
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
