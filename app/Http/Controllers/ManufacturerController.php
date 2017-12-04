<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function __construct()
    {
		$this->manufacturer = new Manufacturer();
    }
    public function index()
    {
		return view('manufacturers/list');
    }
    public function add()
    {
		return view('manufacturers/add');
    }
    public function save(Request $request)
    {
		return redirect()->back();
    }
    public function view($id)
    {
		return view('manufacturers/view');
    }
    public function edit($id)
    {
		return view('manufacturers/edit');
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
