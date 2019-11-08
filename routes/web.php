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

/**
 * Unauthenticated Routes
 */
Route::get('/', 'MainController@index')->name('index');

Route::get('/list_teams', 'MainController@list_teams')->name('teams');
Route::get('/list_players', 'MainController@list_players')->name('players');
Route::get('/list_coaches', 'MainController@list_coaches')->name('coaches');
Route::get('/list_leaders', 'MainController@list_leaders')->name('leaders');

Route::get('/insert_teams', 'MainController@form_teams')->name('insert_form');
Route::post('/insert_teams', 'MainController@insert_teams')->name('insert_teams');
Route::get('/insert_players', 'MainController@form_players')->name('insert_form');
Route::post('/insert_players', 'MainController@insert_players')->name('insert_players');
Route::get('/insert_coaches', 'MainController@form_coaches')->name('insert_form');
Route::post('/insert_coaches', 'MainController@insert_coaches')->name('insert_coaches');
Route::get('/insert_leaders', 'MainController@form_leaders')->name('insert_form');
Route::post('/insert_leaders', 'MainController@insert_leaders')->name('insert_leaders');

/**
 *  Auth & Registration
 */
Auth::routes();

/**
 * Authenticated only Routes
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Backoffice Routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Backoffice', 'middleware' => ['auth', 'role:admin|manager']],
    function()
    {
        Route::get('/', 'DashboardController@index')->name('admin');

        Route::resource('user', 'UserController');
    }
);
