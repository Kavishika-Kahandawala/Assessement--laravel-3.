<?php

class Auth_Logout_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        // Clear the user session data
        Session::forget('user');

        // Redirect to the login page or any other page as needed
        return Redirect::to('login')->with('message', 'You have been logged out.');
    }
}
