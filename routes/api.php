<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('test_mail/{user_id}','App\AppUserController@testMail');


#Login
Route::post('login','App\AppLoginController@login');


#Default Data
Route::get('get_country','App\AppDefaultController@getCountry');
Route::get('get_state/{country_id}','App\AppDefaultController@getState');
Route::get('get_zipcode/{state_id}','App\AppDefaultController@getZipcode');
Route::get('get_role/{id}','App\AppDefaultController@getRole');
Route::get('get_payment_terms','App\AppDefaultController@getPaymentTerms');


#User
Route::get('create_user_details/{user_id}','App\AppUserController@createUserDetails');
Route::post('create_user','App\AppUserController@createUser');
Route::post('edit_user','App\AppUserController@editUser');

Route::get('view_users/{user_id}/{role_id}','App\AppUserController@viewUsers');
Route::get('view_assigned_users/{user_id}/{role_id}','App\AppUserController@viewAssignedUsers');
Route::get('view_user_details/{user_id}','App\AppUserController@viewUserDetails');

Route::post('delete_user','App\AppUserController@deleteUser');
Route::post('block_user','App\AppUserController@blockUser');
Route::post('unblock_user','App\AppUserController@unBlockUser');


#Customer
Route::get('create_customer_details/{user_id}','App\AppCustomerController@createCustomerDetails');
Route::post('create_customer','App\AppCustomerController@createCustomer');
Route::post('edit_customer','App\AppCustomerController@editCustomer');

Route::get('view_customers/{user_id}/{include_all}','App\AppCustomerController@viewCustomers');

Route::get('approve_customer/{user_id}/{customer_id}/{approve_status}','App\AppCustomerController@approveCustomer');

Route::post('delete_customer','App\AppCustomerController@delete');
Route::post('block_customer','App\AppCustomerController@block');
Route::post('unblock_customer','App\AppCustomerController@unBlock');


#Schedule
Route::get('view_create_schedule/{user_id}','App\AppScheduleController@viewCreateSchedule');
Route::post('create_schedule','App\AppScheduleController@createSchedule');
Route::post('update_auto_schedule','App\AppScheduleController@updateAutoSchedule');

Route::get('view_schedule/{schedule_status}/{user_id}/{selected_user_id?}/{customer_id?}/{from_date?}/{to_date?}','App\AppScheduleController@viewSchedule');

Route::post('checkout_schedule','App\AppScheduleController@checkoutSchedule');
Route::post('remove_schedule','App\AppScheduleController@removeSchedule');

Route::post('add_instant_sale','App\AppScheduleController@addInstantSale');

Route::get('view_visit_report/{user_id}/{selected_user_id}/{customer_id}/{from_date?}/{to_date?}','App\AppScheduleController@viewVisitReport');


#Target
Route::get('view_create_target/{user_id}','App\AppTargetController@viewCreateTarget');
Route::post('create_target','App\AppTargetController@createTarget');

Route::get('view_target/{user_id}/{selected_user_id}/{target_view_count}','App\AppTargetController@viewTarget');
Route::post('remove_target','App\AppTargetController@removeTarget');


#Expense
Route::post('add_expense','App\AppExpenseController@addExpense');
Route::post('edit_expense','App\AppExpenseController@editExpense');

Route::get('view_expense/{user_id}/{selected_user_id}/{from_date?}/{to_date?}','App\AppExpenseController@viewExpense');


#Cron Jobs
Route::get('auto_create_schedule','App\CronJobsController@autoCreateSchedule');
Route::get('put_pending_visits','App\CronJobsController@putPendingVisits');