<?php

$router->group(['prefix' => 'api/v1'], function($router)
{
    /*
     * USERS
     */
    $router->get('/{user_slug}/details', ['uses' => 'Users\Http\Controllers\UserController@getUser']);
    $router->get('/users', ['uses' => 'Users\Http\Controllers\UserController@getUsers']);

});