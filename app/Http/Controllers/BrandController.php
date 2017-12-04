<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
		$this->brand = new Brand();
    }
    public function index()
    {
		return view('brands/list');
    }
    public function add()
    {
		return view('brands/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('brands/view');
    }
    public function edit($id)
    {
		return view('brands/edit');
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
