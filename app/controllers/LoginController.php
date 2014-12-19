<?php

class LoginController extends BaseController {
    public function getIndex() {
        return View::make('Login.login');
    }

    public function postLogin() {
        $userdata = array(
            'username' 	=> Input::get('username'),
            'password' 	=> Input::get('password'),
        );
        if (Auth::attempt($userdata, true)) {
            $user_informations = Auth::user();
            Session::put('user_id', $user_informations->id);
            Session::put('user_name', $user_informations->username);
            return Redirect::action('AdminController@getIndex');
        }
        else {
            return Redirect::back();
        }
    }
    public function getLogout() {
        Auth::logout();
        return Redirect::to('/login');
    }
}