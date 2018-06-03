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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['web','auth']],function () {
    Route::get('members/', 'MemberController@index')->name('members.list');
    Route::get('members/add', 'MemberController@create')->name('members.add');
    Route::post('members/add', 'MemberController@store')->name('members.add');
    Route::post('members/record-death', 'MemberController@recordDeath')->name('members.record-death');
    Route::post('members/mark-as-deceased', 'MemberController@markDeceased')->name('members.markDeceased');
    Route::get('members/details', 'MemberController@details')->name('members.details');
    Route::post('members/report', 'MemberController@report')->name('members.report');
});

Route::get('members/verify', 'MemberController@verify')->name('members.verify');
Route::get('members/save-finger', 'MemberController@saveFinger')->name('members.verify');
