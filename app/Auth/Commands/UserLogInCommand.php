<?php namespace ThreeAccents\Auth\Commands;


class UserLogInCommand
{
    public $username;
    public $password;

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}