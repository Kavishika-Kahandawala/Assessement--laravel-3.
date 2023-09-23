<?php

class Auth_Login_Controller extends Base_Controller
{

    public $restful = true;

    public function get_index()
    {
        return View::make('auth.login');
    }

    public function post_index()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        // Replace this with your authentication logic (e.g., check credentials in a database)
        if ($username === 'your_username' && $password === 'your_password') {
            // Authentication successful, redirect to the dashboard
            return Redirect::to('dashboard');
        } else {
            // Authentication failed, redirect back to the login page with an error message
            return Redirect::to('login')->with('message', 'Login failed. Please try again.');
        }
    }
}