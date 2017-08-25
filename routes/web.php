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
use App\User;

Route::get('/', function () {
	$users = User::all();
    return view('welcome', compact('users'));
});

Route::post('login', 'LoginController@authenticate');
Route::get('login', function(){
	Auth::logout();
	return view('blades.login');
})->name('login');

Route::get('dashboard', function(){
	$users = User::all();
	return view('blades.dashboard', compact('users'));
})->middleware('auth');

Route::resource('users', 'MemberController');

Route::get('finance', 'FinanceController@index');