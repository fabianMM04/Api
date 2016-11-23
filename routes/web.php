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

Route::get('/', 'AppController@ShowLastFive');                                    // Show the welcome view and the last five blog instances with their photos


Route::get('/create/blog', 'AppController@ShowForm');                             // Show a form to create a blog instance
Route::post('/post/blog', 'AppController@Post');                                  // Post a blog instance (Request)

Route::get('/show/{id}', 'AppController@Show');                                   // Show a particular blog with their photos
