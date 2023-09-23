<?php

class Auth_Register_Controller extends Base_Controller
{
    public $restful = true;
    public function get_index()
    {
        // Display the registration form view
        return View::make('auth.register');
    }

    public function post_register()
    {
        try {
            // Retrieve form data
            $username = Input::get('username');
            $password = Input::get('password');
            $name = Input::get('name');

            // Hash the password using bcrypt
            $hashedPassword = Hash::make($password);

            // Insert data into the 'users' table
            User::insert(
                array(
                    'username' => $username,
                    'password' => $hashedPassword,
                    // Store the hashed password
                    'name' => $name
                )
            );

            // Redirect the user to the login page
            return Redirect::to('login');
        } catch (Exception $e) {
            // Log the error, handle it, or display an error message
            // For example, you can log the error to a log file:
            Log::write('error', $e->getMessage());

            // Optionally, redirect the user to an error page or display an error message
            return View::make('error')->with('message', 'An error occurred while processing your registration.');
        }
    }
}