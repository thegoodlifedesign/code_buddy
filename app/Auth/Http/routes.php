<?php

$router->get('/auth/login', ['as' => 'login', 'uses' => 'Auth\Http\Controllers\AuthController@getLogin']);
$router->post('/auth/login', ['as' => 'login', 'uses' => 'Auth\Http\Controllers\AuthController@postLogin']);
$router->get('/auth/register', ['as' => 'register', 'uses' => 'Auth\Http\Controllers\AuthController@getRegister']);
$router->post('/auth/register', ['as' => 'register', 'uses' => 'Auth\Http\Controllers\AuthController@postRegister']);