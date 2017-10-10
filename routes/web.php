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
    $router->get('tasks/{date}','TaskController@findByDate');

    $router->post('task','TaskController@createTask');

    $router->put('task/{id}','TaskController@updateTask');

    $router->delete('task/{id}','TaskController@deleteTask');

    $router->get('tasks','TaskController@index');

    $router->get('task/{id}','TaskController@getTaskById');

    $router->get('mytasks', 'TaskController@getMyTasks');

    $router->post('day','TaskGroupController@createDay');

    $router->put('day/{id}','TaskGroupController@updateDay');

    $router->delete('day/{id}','TaskGroupController@deleteDay');

    $router->get('days','TaskGroupController@index');

    $router->get('day/{id}','TaskGroupController@getTaskGroupById');

    $router->post('lvl','ExpLvlController@createLvl');

    $router->put('lvl/{id}','ExpLvlController@updateLvl');

    $router->delete('lvl/{id}','ExpLvlController@deleteLvl');

    $router->get('lvls','ExpLvlController@index');

    $router->get('lvl/{id}','ExpLvlController@getlvlById');

    $router->post('project','ProjectController@createProject');

    $router->put('project/{id}','ProjectController@updateProject');

    $router->delete('project/{id}','ProjectController@deleteProject');

    $router->get('projects','ProjectController@index');

    $router->get('project/{id}','ProjectController@getProjectById');

    $router->post('tag','TagController@createTag');

    $router->put('tag/{id}','TagController@updateTag');

    $router->delete('tag/{id}','TagController@deleteTag');

    $router->get('tags','TagController@index');

    $router->get('tag/{id}','TagController@getTagById');

    $router->post('status','TaskStatusController@createTaskStatus');

    $router->put('status/{id}','TaskStatusController@updateTaskStatus');

    $router->delete('status/{id}','TaskStatusController@deleteTaskStatus');

    $router->get('statuses','TaskStatusController@index');

    $router->get('status/{id}','TaskStatusController@getStatusById');

    $router->post('role','UserRoleController@createUserRole');

    $router->put('role/{id}','UserRoleController@updateUserRole');

    $router->delete('role/{id}','UserRoleController@deleteUserRole');

    $router->get('roles','UserRoleController@index');

    $router->get('role/{id}','UserRoleController@getUserRoleById');

    $router->post('usergroup','UserGroupController@createUserGroup');

    $router->put('usergroup/{id}','UserGroupController@updateUserGroup');

    $router->delete('usergroup/{id}','UserGroupController@deleteUserGroup');

    $router->get('usergroups','UserGroupController@index');

    $router->get('usergroup/{id}','UserGroupController@getUserGroupById');

    $router->post('user','AuthController@createUser');

    $router->put('user/{id}','AuthController@updateUser');

    $router->delete('user/{id}','AuthController@deleteUser');

    $router->get('user/{id}','AuthController@getUserById');

    $router->get('register','AuthController@register');

    $router->get('login','AuthController@login');

    $router->get('users','AuthController@index');

});
