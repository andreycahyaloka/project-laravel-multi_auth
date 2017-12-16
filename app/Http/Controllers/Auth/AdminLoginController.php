<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AdminLoginController extends Controller
{
    //
	public function __construct() {
		$this->middleware('guest:admin')->except('logout');
	}

	public function showLoginForm() {
		return view('auth.adminlogin');
	}

	public function login(Request $request) {
		$this->validate($request, [
			'email' => 'required|string|email|max:100',
			'password' => 'required|string|min:6|max:100',
		]);

		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
			return redirect()->intended(route('admin.index'));
		}

		return redirect()->back()->withInput($request->only('email', 'remember'));
	}

	public function logout() {
		Auth::guard('admin')->logout();
		return redirect('/');
	}
}
