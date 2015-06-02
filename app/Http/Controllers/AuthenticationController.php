<?php namespace Dokoiko\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function getIndex()
	{
		return view('login.login');
	}

	public function postAuthenticate(Request $request)
	{
		$credentials = $request->only('username', 'password');
		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return Redirect::action('AdminController@getIndex');
		}

		return Redirect::action('AuthenticationController@getIndex')
			->withInput($request->only('username'))
			->withErrors([
				'error' => 'Wrong credentials, try again !',
			]);
	}

	public function getLogout()
	{
		$this->auth->logout();
		return Redirect::action('AuthenticationController@getIndex');
	}
}