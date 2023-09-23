<?php

class User extends Eloquent
{
    public static $table = 'users';
    public static $timestamps = false; // Set to true if your table has created_at and updated_at columns
}
