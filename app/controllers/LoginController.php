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
        if (Auth::attempt($userdata)) {
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