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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1/'], function() use ($router)
{
    $router->post('createcycle','CycleController@createLongCycle');

    $router->delete('cycle/{id}','CycleController@deleteCycle');

    $router->post('createlength','LengthCycleController@createLengthCycle');

    $router->get('long','CycleController@getLong');

    $router->get('allsteps','StepController@index');

    $router->get('steps','StepController@getMySteps');

    $router->post('priority','PriorityController@create');

    $router->post('day','DayController@create');

    $router->put('check/{id}','TaskController@checkTask');

    $router->post('task','TaskController@createTask');

    $router->put('task/{id}','TaskController@updateTask');

    $router->delete('task/{id}','TaskController@deleteTask');

    $router->get('tasks','TaskController@index');

    $router->get('task/{id}','TaskController@getTaskById');

    $router->get('mytasks', 'TaskController@getTasks');

    $router->post('user','AuthController@createUser');

    $router->put('user/{id}','AuthController@updateUser');

    $router->delete('user/{id}','AuthController@deleteUser');

    $router->get('user/{id}','AuthController@getUserById');

    $router->get('register','AuthController@register');

    $router->get('login','AuthController@login');

    $router->get('users','AuthController@index');

    $router->post('oauth','AuthController@loginAuth');

    $router->get('getcurrentuser','AuthController@getCurrentUser');

    $router->put('updateexp/{id}','AuthController@updateExp');

});
