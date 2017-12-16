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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function() {
	return view('/guests/index');
})->name('guest.index');

Route::get('/about', function() {
	return view('/guests/about');
})->name('guest.about');

Route::get('/contact', function() {
	return view('/guests/contact');
})->name('guest.contact');

// home
Route::get('/home', function() {
	if (Auth::guard()) { // if (Auth::user()) {
		if (Auth::guard('admin')->check()) {
			return redirect('/admin');
		}
		elseif (Auth::guard('user')->check()) {
			return redirect('/user');
		}
		else {
			// invalid user
			return redirect('/');
		}
	}
	else {
		// unregistered user / not login
		return redirect('/');
	}
});

// admin
Route::group(['prefix' => 'admin'], function() {
	// Admin Authentication Routes...
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	// Admin Password Reset Routes...
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

	Route::group(['middleware' => ['auth:admin']], function() {
		Route::get('/', 'AdminController@index')->name('admin.index');
		Route::get('/userdata', 'UserdataController@index')->name('userdata.index');
	});
});

// user
Route::group(['prefix' => 'user'], function() {
	// User Authentication Routes...
	Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
	Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
	Route::post('/logout', 'Auth\UserLoginController@logout')->name('user.logout');

	// User Password Reset Routes...
	Route::get('/password/reset', 'Auth\UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
	Route::post('/password/email', 'Auth\UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
	Route::get('/password/reset/{token}', 'Auth\UserResetPasswordController@showResetForm')->name('user.password.reset');
	Route::post('/password/reset', 'Auth\UserResetPasswordController@reset');

	Route::group(['middleware' => ['auth:user']], function() {
		Route::get('/', 'UserController@index')->name('user.index');
	});
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
