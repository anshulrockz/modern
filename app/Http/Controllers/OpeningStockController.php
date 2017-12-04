<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\OpeningStock;

class OpeningStockController extends Controller
{
    public function __construct()
    {
		$this->openingstock = new OpeningStock();
    }
    public function index()
    {
		return view('openingstocks/list');
    }
    public function add()
    {
		return view('openingstocks/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('openingstocks/view');
    }
    public function edit($id)
    {
		return view('openingstocks/edit');
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
