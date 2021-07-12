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
Route::get('/', 'HomeController@HomeIndex')->middleware('checkLogin');
Route::get('/visitor', 'VisitorController@VisitorIndex')->middleware('checkLogin');

//Service Part Management
Route::get('/service', 'ServiceController@ServiceIndex')->middleware('checkLogin');
Route::get('/getServicesData', 'ServiceController@getServicesData')->middleware('checkLogin');
Route::post('/serviceDelete', 'ServiceController@serviceDelete')->middleware('checkLogin');
Route::post('/ServicesDetails', 'ServiceController@getServicesDetails')->middleware('checkLogin');
Route::post('/ServicesUpdate', 'ServiceController@serviceUpdate')->middleware('checkLogin');
Route::post('/serviceAdd', 'ServiceController@serviceAdd')->middleware('checkLogin');


//Courses Part Management
Route::get('/courses', 'CoursesController@CoursesIndex')->middleware('checkLogin');
Route::get('/getCoursesData', 'CoursesController@getCoursesData')->middleware('checkLogin');
Route::post('/CoursesDelete', 'CoursesController@CoursesDelete')->middleware('checkLogin');
Route::post('/CoursesDetails', 'CoursesController@getCoursesDetails')->middleware('checkLogin');
Route::post('/coursesUpdate', 'CoursesController@coursesUpdate')->middleware('checkLogin');
Route::post('/coursesAdd', 'CoursesController@coursesAdd')->middleware('checkLogin');

//Project Part Management

Route::get('/Project', 'ProjectController@ProjectsIndex')->middleware('checkLogin');
Route::get('/getProjectsData', 'ProjectController@getProjectsData')->middleware('checkLogin');
Route::post('/ProjectsDelete', 'ProjectController@ProjectsDelete')->middleware('checkLogin');
Route::post('/ProjectsDetails', 'ProjectController@getProjectsDetails')->middleware('checkLogin');
Route::post('/ProjectsUpdate', 'ProjectController@ProjectsUpdate')->middleware('checkLogin');
Route::post('/ProjectsAdd', 'ProjectController@ProjectsAdd')->middleware('checkLogin');

//Contact Part Management

Route::get('/Contact', 'ContactController@ContactIndex')->middleware('checkLogin');
Route::get('/getContactData', 'ContactController@getContactData')->middleware('checkLogin');
Route::post('/ContactDelete', 'ContactController@ContactDelete')->middleware('checkLogin');

//Review Part Management

Route::get('/Review', 'ReviewController@ReviewIndex')->middleware('checkLogin');
Route::get('/getReviewData', 'ReviewController@getReviewData')->middleware('checkLogin');
Route::post('/ReviewDelete', 'ReviewController@ReviewDelete')->middleware('checkLogin');

//Login
Route::get('/Login', 'LoginController@adminLoginIndex');
Route::post('/onLogin', 'LoginController@onLogin');
Route::get('/Logout', 'LoginController@logoutAdmin');


//Photo Gallery

Route::get('/Photo', 'PhotoController@photoIndex')->middleware('checkLogin');
Route::get('/PhotoJsonData', 'PhotoController@photoJsonData')->middleware('checkLogin');
Route::post('/PhotoUpload', 'PhotoController@PhotoUpload')->middleware('checkLogin');
Route::post('/photoJsonDataByID/{id}', 'PhotoController@photoJsonDataByID')->middleware('checkLogin');
Route::post('/photoDelete', 'PhotoController@photoDelete')->middleware('checkLogin');



