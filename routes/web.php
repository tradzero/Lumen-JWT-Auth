<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['middleware' => []], function () use ($app) {
    $app->post('login', 'AuthController@login');
});

$app->group(['middleware' => ['auth']], function () use ($app) {
    $app->post('logout', 'AuthController@logout');
    $app->post('refresh', 'AuthController@refresh');
    $app->get('me', 'AuthController@me');
});
