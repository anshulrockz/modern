<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return view('welcome');
    }
    else{
        return redirect()->action('LoginController@index');
    }
});

Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@index']);
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);

Route::group(['middleware' => 'auth'], function () {
    
    //Edit Profile
	Route::get('/profile','ProfileController@index');
	Route::get('/profile/edit','ProfileController@edit');
	Route::post('/profile/edit','ProfileController@update');
	
	//Change password
	Route::get('/change-password','ChangepasswordController@index');
	Route::post('/change-password','ChangepasswordController@update');
	
    //Logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
    
    //Customers
	Route::resource('/customers','CustomerController');
	
	//Products
	Route::resource('/products','ProductController');
	
	//Categories
	Route::resource('/categories','CategoryController');
	
	//Brands
	Route::resource('/brands','BrandController');
	
	//Manufacturers
	Route::resource('/manufacturers','ManufacturerController');
	
	//Forms
	Route::resource('/forms','FormController');
	
	//Units
	Route::resource('/units','UnitController');
	
	//Taxes
	Route::resource('/taxes','TaxController');
	
	//Opening Stocks
	Route::resource('/opening-stocks','OpeningStockController');
		
	//Firms
	Route::resource('/firms','FirmController');
	
	//Terms & Conditions
	Route::resource('/terms','TermController');
	
	//Bank Details
	Route::resource('/bank-details','BankController');
	
	//Accounts
	Route::resource('/accounts','AccountController');
	
	//Expenses
	Route::resource('/expenses','ExpenseController');
	
	//Incomes
	Route::resource('/incomes','IncomeController');
	
});
