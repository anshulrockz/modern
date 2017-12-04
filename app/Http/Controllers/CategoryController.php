<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
		$this->category = new Category();
    }
    public function index()
    {
		return view('categories/list');
    }
    public function add()
    {
		return view('categories/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('categories/view');
    }
    public function edit($id)
    {
		return view('categories/edit');
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
