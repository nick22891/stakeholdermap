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

Route::get('map', 'AdminController@getStakeholderMap');

Route::get('stakeholders', 'AdminController@getStakeholderPage');

Route::get('initiatives', 'AdminController@getInitiativePage');

Route::get('stakeholdersJSON', 'AdminController@getStakeholderJSON');

Route::get('initiativesJSON/{stakeholder_id}', 'AdminController@getInitiativeJSON');

Route::get('geocodesJSON/{country}', 'AdminController@getGeocodeJSON');

Route::get('geocodesJSON', 'AdminController@getAllGeocodeJSON');

Route::get('stakeholders/add', 'AdminController@addStakeholderPage');

Route::post('stakeholders/add', 'AdminController@processStakeholder');

Route::get('initiatives/add', 'AdminController@addInitiativePage');

Route::post('initiatives/add', 'AdminController@processInitiative');

Route::post('stakeholders/edit', 'AdminController@editStakeholder');

Route::post('initiatives/edit', 'AdminController@editInitiative');

Route::post('initiatives/editStakeholders', 'AdminController@editInitiativeStakeholders');

Route::get('stakeholders/delete/{stakeholder}', 'AdminController@deleteStakeholder');

Route::get('initiatives/delete/{initiative}', 'AdminController@deleteInitiative');

