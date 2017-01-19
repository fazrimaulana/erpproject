<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    /*return view('welcome');*/
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home/view_task/{task}', 'ProjectController@ViewTask');

Route::group(['prefix' => 'dashboard'], function(){

	/**
     * -----------------------------------------
     * Dashboard
     * -----------------------------------------
     */
    Route::get('/', 'HomeController@index');

    /**
     * -----------------------------------------
     * Users
     * -----------------------------------------
     */
    Route::get('/profile', 'UserController@index');
    Route::get('/profile/{user}', 'UserController@show');
    Route::get('/profile/{user}/edit', 'UserController@getData');
    Route::post('/profile/{user}/edit', 'UserController@edit');
    Route::get('/profile/{user}/changePassword', 'UserController@getData');
    Route::post('/profile/{user}/changePassword', 'UserController@edit');

    /**
     * -----------------------------------------
     * Clients
     * -----------------------------------------
     */
    Route::get('/clients', 'ClientController@index');
    Route::get('/client/add', 'ClientController@add');
    Route::post('/client/add', 'ClientController@store');
    Route::get('/client/{client}/edit', 'ClientController@getData');
    Route::post('/client/{client}/edit', 'ClientController@edit');
    Route::post('/client/delete', 'ClientController@delete');
    Route::get('/client/{client}/view', 'ClientController@view');

    /**
     * -----------------------------------------
     * Projects
     * -----------------------------------------
     */
    Route::group(['prefix' => 'project'], function(){
        Route::get('/', 'ProjectController@index');
        Route::get('/add', 'ProjectController@add');
        Route::post('/add', 'ProjectController@store');
        Route::get('/{project}/edit', 'ProjectController@getData');
        Route::post('/{project}/edit', 'ProjectController@edit');
        Route::post('/delete', 'ProjectController@delete');
        Route::get('/{project}/view', 'ProjectController@view');
        Route::post('/{project}/addteam', 'ProjectController@AddTeam');
        Route::get('/{project}/edit_team/{user}', 'ProjectController@getEditTeam');
        Route::post('/{project}/edit_team', 'ProjectController@EditTeam');
        Route::post('/{project}/team_delete', 'ProjectController@teamDelete');
        Route::get('/{project}/addtask', 'ProjectController@getTask');
        Route::post('/{project}/addtask', 'ProjectController@AddTask');
        Route::post('/task/delete', 'ProjectController@DeleteTask');
        Route::get('/{project}/view_task/{task}', 'ProjectController@ViewTask');
        Route::post('/{project}/addfile', 'ProjectController@AddFile');
        Route::get('/{project}/edit_task/{task}', 'ProjectController@getEditTask');
        Route::post('/{project}/edit_task/{task}', 'ProjectController@EditTask');
        Route::post('/{project}/edit_task/{task}/delete_file/{file}', 'ProjectController@DeleteTaskFile');
        Route::post('/{project}/delete_file/{file}', 'ProjectController@DeleteProjectFile');
    });

    /**
     * -----------------------------------------
     * Files
     * -----------------------------------------
     */
    Route::get('/files', 'FileController@index');
    Route::post('/file/add', 'FileController@add');
    Route::post('/file/edit', 'FileController@edit');
    Route::post('/file/delete', 'FileController@delete');

    /**
     * -----------------------------------------
     * Teams
     * -----------------------------------------
     */
    Route::get('/team', 'TeamController@index');
    Route::get('/view_team/{team}', 'TeamController@viewTeam');
    Route::post('/team/add', 'TeamController@add');
    Route::post('/team/edit', 'TeamController@edit');
    Route::post('/team/delete', 'TeamController@delete');

});
