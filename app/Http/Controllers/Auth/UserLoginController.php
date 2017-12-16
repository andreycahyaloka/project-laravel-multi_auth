<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class UserLoginController extends Controller
{
    //
	public function __construct() {
		$this->middleware('guest:user')->except('logout');
	}

	public function showLoginForm() {
		return view('auth.userlogin');
	}

	public function login(Request $request) {
		$this->validate($request, [
			'username' => 'required|string|max:100',
			'password' => 'required|string|min:6|max:100',
		]);

		if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
			return redirect()->intended(route('user.index'));
		}

		return redirect()->back()->withInput($request->only('username', 'remember'));
	}

	public function logout() {
		Auth::guard('user')->logout();
		return redirect('/');
	}
}
