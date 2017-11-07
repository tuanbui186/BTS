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
    return view('login');
});

Route::get('/dashboard',['as'=>'getDashboard','uses'=>'DashboardController@index']);

//dashboard
Route::get('/customermanager',['as'=>'getCustomerManager','uses'=>'CustomerController@index']);
Route::get('/employee', ['as'=>'getEmployee','uses'=>'DashboardController@getEmployee']);
Route::get('/get-time-service', ['as'=>'getTimeService','uses'=>'DashboardController@getTimeService']);
Route::get('/get-ratio-circle', ['as'=>'getRatioCircle','uses'=>'DashboardController@getRatioCircle']);
Route::get('/get-vote', ['as'=>'getVote','uses'=>'DashboardController@getVote']);

//employee
Route::get('/employeemanager',['as'=>'getEmployeeManager','uses'=>'EmployeeController@index']);
Route::get('/employeeattendance',['as'=>'getEmployeeAttendance','uses'=>'EmployeeController@employeeAttendance']);
Route::get('/detail-employee/{id}',['as'=>'detailEmployee','uses'=>'EmployeeController@detailEmployee']);
Route::get('/get-chart-average-score',['as'=>'getChartAverageScore','uses'=>'EmployeeController@getChartAverageScore']);
Route::get('/get-attendance-employee',['as'=>'getAttendanceEmployee','uses'=>'Employeecontroller@getAttendanceEmployee']);
Route::get('/get-Info-Employee',['as'=>'getInfoEmployee','uses'=>'EmployeeController@getInfoEmployee']);

Route::get('/developing', function () {
    return view('developing');
});

Route::get('/test', function() {
    return view('test');
});