<?php

namespace Dokoiko\Http\Controllers;

use Dokoiko\Http\Requests\AdminInfosRequest;
use Dokoiko\Http\Requests\AdminSettingsRequest;
use Dokoiko\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return view('Admin.home')->with('user', User::find(Auth::id()));
	}

	public function postUpdateAdminUserInfos(AdminInfosRequest $request)
	{
		$update = $request->all();

		$user = User::find(Auth::id());
		$user->description = $update['author-description'];
		$user->full_name = $update['author-name'];
		if ($request->has('author-picture'))
		{
			if ($user->image != null)
			{
				$filename = explode('/', $user->image);
				File::delete('Content/' . end($filename));
			}
			$filename = Str::random($lenght = 30) . '.' . $update['author-picture']->getClientOriginalExtension();
			$update['author-picture']->move('Content/', $filename);
			$user->image = $filename;
		}
		$user->save();

		return view('Admin.home')->with('user', User::find(Auth::id()))->withErrors(['success' => 'Informations updated with success.']);
	}

	public function postUpdateAdminUserSettings(AdminSettingsRequest $request)
	{
		$update = $request->all();
		if ($update['author-password'] != $update['author-password-two'])
			return view('Admin.home')->withErrors([
				'error' => 'Passwords don\'t match !'
			])->with('user', User::find(Auth::id()));
		$user = User::find(Auth::id());
		$user->password = Hash::make($update['author-password']);
		$user->username = $update['author-username'];
		$user->save();
		return view('Admin.home')->with('user', User::find(Auth::id()))->withErrors(['success' => 'Informations updated with success.']);
	}
}