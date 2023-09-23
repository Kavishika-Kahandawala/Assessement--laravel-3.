<?php

class UserController extends Base_Controller
{

    public $restful = true;

    public function viewUsers() {
        $users = User::all();

        return View::make('users.view')->with('users', $users);
    }
}