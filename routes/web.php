<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/compiler', 'CompilerController@index')->name('compiler');
Route::get('/compiler/{releaseID}', 'CompilerController@show')->name('getCompilerForSpecificRelease')->where('releaseID', '[0-9]+');

Route::post('/project','ProjectsController@store')->name('addProject');
Route::put('/project/{id}', 'ProjectsController@update')->name('editProject')->where('id', '[0-9]+');
Route::delete('/project/{id}', 'ProjectsController@destroy')->name('deleteProject')->where('id', '[0-9]+');

Route::post('/teammate','TeammatesController@store')->name('addTeammate');
Route::delete('/teammate/{id}','TeammatesController@destroy')->name('deleteTeammate')->where('id', '[0-9]+');

Route::post('/working_group','WorkingGroupsController@store')->name('addWorkingGroup');
Route::delete('/working_group/{id}','WorkingGroupsController@destroy')->name('deleteWorkingGroup')->where('id', '[0-9]+');

Route::post('/environment','EnvironmentsController@store')->name('addEnvironment');
Route::delete('/environment/{id}','EnvironmentsController@destroy')->name('deleteEnvironment')->where('id', '[0-9]+');

Route::post('/support_team','SupportTeamsController@store')->name('addSupportTeam');
Route::delete('/support_team/{id}','SupportTeamsController@destroy')->name('deleteSupportTeam')->where('id', '[0-9]+');

Route::get('/release/{id}', 'ReleasesController@show')->name('showRelease')->where('id', '[0-9]+');
Route::post('/release','ReleasesController@store')->name('addRelease');
Route::put('/release/{id}', 'ReleasesController@update')->name('editRelease')->where('id', '[0-9]+');
Route::put('/release/updateR&A/{id}', 'ReleasesController@updateRiskAndAssessment')->name('editReleaseRaA')->where('id', '[0-9]+');
Route::delete('/release/{id}', 'ReleasesController@destroy')->name('deleteRelease')->where('id', '[0-9]+');

Route::post('/ticket','TicketsController@store')->name('addTicket');
Route::put('/ticket/{id}', 'TicketsController@update')->name('editTicket')->where('id', '[0-9]+');
Route::delete('/ticket/{id}', 'TicketsController@destroy')->name('deleteTicket')->where('id', '[0-9]+');

Route::get('/release/{releaseID}/ticket/{ticketID}/instructions', 'InstructionsController@getInstructionsByReleaseAndTicket')
    ->name('getInstructionsByReleaseAndTicket')
    ->where('releaseID', '[0-9]+')
    ->where('ticketID', '[0-9]+');
Route::get('/instruction/{id}', 'InstructionsController@show')->name('getInstruction')->where('id', '[0-9]+');
Route::post('/instruction', 'InstructionsController@store')->name('addInstruction');
Route::put('/instruction/{id}', 'InstructionsController@update')->name('editInstruction')->where('id', '[0-9]+');
Route::delete('/instruction/{id}', 'InstructionsController@destroy')->name('deleteInstruction')->where('id', '[0-9]+');

Route::view('/restricted/method', 'restrictions/method');
Route::view('/restricted/userRole', 'restrictions/userRole');
