<?php

namespace Dokoiko\Http\Controllers;

use Dokoiko\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class UserAdminController extends AdminController {

	public function __construct()
	{
		$this->middleware('super-admin');
	}

	public function getHome()
	{
		return view('admin.users.home')->with('users', User::orderBy('username', 'desc')->get());;
	}

	public function getAddUser()
	{
		$User = new User;
		$User->username = Str::random($lenght = 10);
		$User->password = Hash::make('newuser');
		$User->privileges = 'normal';
		$User->Save();

		return view('admin.users.users')->with('users', User::orderBy('username', 'desc')->get());
	}

	public function postEditUser()
	{
		$User = User::find(Input::get('id'));
		$User->privileges = Input::get('privileges');
		$User->username = Input::get('username');
		$User->password = Hash::make(Input::get('password'));
		$User->save();

		return view('admin.users.users')->with('users', User::orderBy('username', 'desc')->get());
	}

	public function postDeleteUser()
	{
		User::find(Input::get('id'))->delete();

		return view('admin.users.users')->with('users', User::orderBy('username', 'desc')->get());
	}
}