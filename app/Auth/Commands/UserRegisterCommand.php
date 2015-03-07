<?php namespace ThreeAccents\Auth\Commands;


class UserRegisterCommand
{

    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $slug;

    function __construct($username, $slug, $first_name, $last_name, $email, $password)
    {
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->slug = $slug;
    }
}