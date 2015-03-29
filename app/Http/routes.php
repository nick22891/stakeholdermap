<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('stakeholders', 'AdminController@getStakeholderPage');

Route::get('initiatives', 'AdminController@getInitiativePage');

Route::get('stakeholders/add', 'AdminController@addStakeholderPage');

Route::post('stakeholders/add', 'AdminController@processStakeholder');

Route::get('initiatives/add', 'AdminController@addInitiativePage');

Route::post('initiatives/add', 'AdminController@processInitiative');

