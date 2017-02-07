<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Home Page rendering
 */
Route::get('/', ['as' => 'index', 'uses' => 'ApplicationController@render']);

/*
 * 500px API photos fetcher
 */
Route::post('/fetch', ['as' => 'fetch', 'uses' => 'ApplicationController@fetch']);