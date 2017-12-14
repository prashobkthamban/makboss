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
    return view('home');
});
Route::get('home', function()
{
	return view('home');
});
Route::view('/register', 'company_register');
Route::post('register_company','CompanyController@registerCompany');


Route::get('/gettoken',function () {
	$token=csrf_token();
	return Response::json(array('token' => $token)); 
});
Route::post('app/login','App\AppLoginController@login');
Route::post('app/add_user','App\AppUserController@addUser');
Route::get('users', function()
{
	return view('users');
});
Route::get('customers', function()
{
	return view('customers');
});
Route::get('create_schedule', function()
{
	return view('create_schedule');
});
Route::get('view_schedule', function()
{
	return view('view_schedule');
});
Route::get('instant_sale', function()
{
	return view('instant_sale');
});
Route::get('target', function()
{
	return view('target');
});
Route::get('expense', function()
{
	return view('expense');
});
Route::get('visit_report', function()
{
	return view('visit_report');
});
Route::get('target_report', function()
{
	return view('target_report');
});
Route::get('expense_report', function()
{
	return view('expense_report');
});
Route::get('track_location', function()
{
	return view('track_location');
});
Route::get('chat', function()
{
	return view('chat');
});
Route::get('payment', function()
{
	return view('payment');
});
Route::get('help', function()
{
	return view('help');
});
Route::get('my_profile', function()
{
	return view('my_profile');
});
Route::get('create_customer', function()
{
	return view('create_customer');
});
Route::get('customer_activity', function()
{
	return view('customer_activity');
});
Route::get('customer_contact', function()
{
	return view('customer_contact');
});
Route::get('edit_customer', function()
{
	return view('edit_customer');
});
Route::get('edit_customer', function()
{
	return view('edit_customer');
});
Route::get('edit_expense', function()
{
	return view('edit_expense');
});
Route::get('edit_user', function()
{
	return view('edit_user');
});
Route::get('create_user', function()
{
    return view('create_user');
});
Route::get('view_closed_report', function()
{
	return view('view_closed_report');
});
Route::get('view_customer', function()
{
	return view('view_customer');
});
Route::get('view_executive', function()
{
	return view('view_executive');
});
Route::get('view_manager_executive', function()
{
	return view('view_manager_executive');
});
Route::get('view_manager_supervisor', function()
{
	return view('view_manager_supervisor');
});
Route::get('view_manager', function()
{
	return view('view_manager');
});
Route::get('view_manager_supervisor_executive', function()
{
	return view('view_manager_supervisor_executive');
});
Route::get('view_supervisor_executive', function()
{
	return view('view_supervisor_executive');
});
Route::get('view_supervisor', function()
{
	return view('view_supervisor');
});

