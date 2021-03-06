<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@HomeIndex');
Route::post('/contactSend', 'HomeController@contactSend');


Route::get('/Course', 'CourseController@coursePage');
Route::get('/Policy', 'PolicyController@policyPage');
Route::get('/Project', 'ProjectController@projectPage');
Route::get('/Terms', 'TermsController@termsPage');
Route::get('/Contact', 'ContactController@contactPage');

