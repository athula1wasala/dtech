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

Route::group(['middleware' => 'web'], function (){
    
  Route::get('/','UserController@index');
  Route::post('/login','UserController@postLogin');

Route::group(['middleware' => 'auth'], function (){
    
     Route::get("/logout",'UserController@userLogout'); 
     Route::any("/add-employee",'EmployeerController@postCreateEmployee');
     Route::any("/add-department",'DepartmentrController@postCreateDepartment');
     Route::any("/add-saalry",'SalaryrController@postCreateSalary');
    
});
    
});



