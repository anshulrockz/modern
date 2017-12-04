<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
		$this->product = new Product();
    }
    public function index()
    {
		return view('products/list');
    }
    public function add()
    {
		return view('products/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('products/view');
    }
    public function edit($id)
    {
		return view('products/edit');
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
