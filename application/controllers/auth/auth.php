<?php

class Auth_Controller extends Base_Controller
{
    public function get_login()
    {
        // Show the login form
        return View::make('auth.login');
    }

    public function post_login()
    {
        // Handle the login logic here
    }

    public function get_register()
    {
        // Show the registration form
        return View::make('auth.register');
    }

    public function post_register()
    {
        // Handle the registration logic here
    }
}

