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
    $router->post('createreview','ReviewController@addReview');

    $router->get('review','ReviewController@getReview');

    $router->get('victory','ReviewController@getVictory');

    $router->put('victory/{id}','ReviewController@updateVictory');

    $router->get('lesson','ReviewController@getLesson');

    $router->put('lesson/{id}','ReviewController@updateLesson');

    $router->get('unrested','ReviewController@getUnrested');

    $router->put('unrested/{id}','ReviewController@updateUnrested');

    $router->get('specific','ReviewController@getSpecific');

    $router->put('specific/{id}','ReviewController@updateSpecific');

    $router->post('createcycle','CycleController@createLongCycle');

    $router->post('createweek','CycleController@createWeekCycle');

    $router->get('week','CycleController@getWeek');

    $router->delete('cycle/{id}','CycleController@deleteCycle');

    $router->get('date','CycleController@getDate');

    $router->get('day','DayController@getDay');

    $router->get('days','DayController@index');

    $router->get('daytasks','TaskController@getDayTasks');

    $router->post('createlength','LengthCycleController@createLengthCycle');

    $router->get('length','LengthCycleController@index');

    $router->get('long','CycleController@getLong');

    $router->get('allsteps','StepController@index');

    $router->get('steps','StepController@getMySteps');

    $router->put('step/{id}','StepController@update');

    $router->get('rewards','RewardController@getMyRewards');

    $router->put('reward/{id}','RewardController@update');

    $router->post('priority','PriorityController@create');

    $router->get('priority','PriorityController@index');

    $router->post('day','DayController@create');

    $router->put('check/{id}','TaskController@checkTask');

    $router->post('task','TaskController@createTask');

    $router->put('task/{id}','TaskController@updateTask');

    $router->delete('task/{id}','TaskController@deleteTask');

    $router->get('tasks','TaskController@index');

    $router->get('task/{id}','TaskController@getTaskById');

    $router->get('mytasks', 'TaskController@getTasks');

    $router->put('progress/{id}','DayController@updateProgressComment');

    $router->put('comment/{id}','DayController@updateTaskComment');

    $router->put('gratitude/{id}','DayController@updateGratitude');

    $router->post('user','AuthController@createUser');

    $router->put('user/{id}','AuthController@updateUser');

    $router->delete('user/{id}','AuthController@deleteUser');

    $router->get('user/{id}','AuthController@getUserById');

    $router->get('user','AuthController@getUserByEmail');

    $router->get('register','AuthController@register');

    $router->get('login','AuthController@login');

    $router->get('users','AuthController@index');

    $router->post('oauth','AuthController@loginAuth');

    $router->get('getcurrentuser','AuthController@getCurrentUser');

    $router->put('updateexp/{id}','AuthController@updateExp');

});
