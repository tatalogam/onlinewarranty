<?php

class LoginController extends BaseController{
    /*
	|--------------------------------------------------------------------------
	| LoginController
	|--------------------------------------------------------------------------
	| Route::get('/cpanel', 'LoginController@showLogin');
	*/

    public function _construct(){
        $this->message = "";
    }

    public function showLogin(){
        return View::make('login');
    }

    public function doLogin(){
        $data = Array();

        $credentials = [
            'email'=>Input::get('email'),
            'password'=>Input::get('password')
        ];

        $pass=true;

        //check if user exists
        $user = User::where('email',Input::get('email'))->first();
        if(!$user){
            $this->message = "User not registered yet";
            $pass = false;
        }

        //check if has remember
        if(Input::has('remember_me')) $this->validateByRemember($user);

        //check if already logged in from computer/ phone first
        $this->checkLoggedUser();

        //in case the credentials are valid. Try to login the user.
        if($pass){
            if(Auth::attempt($credentials, true)){
                //by passing true, remember_token is updated
                //update last login
                $user->last_login = date('Y-m-d H:i:s', time());
                $user->update();
                return Redirect::intended('/home');
            }else{
                $this->message = 'Wrong Username / Password';
            }
        }

        //send back the validation errors.
        return Redirect::back()->withErrors($this->message)->withInput();
    }

    public function validateByRemember($user){
        // forcibly remove sessions and logged out user
        if (Auth::viaRemember()){
            $user->last_login = date('Y-m-d H:i:s', time());
            $user->update();
            return Redirect::intended('/home');
        }
    }

    public function checkLoggedUser(){
        // forcibly remove sessions and logged out user
        if (Auth::check()){
            //log user out
            Session::flush();
            Auth::logout();
        }
    }

    public function doLogout(){
        Session::flush();
        Auth::logout();
        return View::make('login');
    }
}