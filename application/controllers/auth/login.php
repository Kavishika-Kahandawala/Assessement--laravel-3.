<?php

class Auth_Login_Controller extends Base_Controller
{

    public $restful = true;

    public function get_index()
    {
        return View::make('auth.login');
    }

    public function post_login()
    {
        try {
            // Retrieve form data
            $username = Input::get('username');
            $password = Input::get('password');

            // Query the database to find a user with the provided username
            $user = User::where('username', '=', $username)->first();

            if ($user && Hash::check($password, $user->password)) {
                // Authentication successful
                // You can set a session variable or implement your authentication logic here

                return Redirect::to('dashboard'); // Redirect to a dashboard or home page
            } else {
                // Authentication failed
                return Redirect::to('login')->with('error', 'Invalid username or password');
            }
        } catch (Exception $e) {
            // Handle exceptions
            // Log the error, redirect to an error page, or display an error message
            Log::write('error', $e->getMessage());
            return View::make('error')->with('message', 'An error occurred while processing your login.');
        }
    }
}