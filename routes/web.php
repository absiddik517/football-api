<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@lineLeague')->name('home');
Route::get('/live', 'PagesController@liveLeague')->name('live');

Route::get('/league/{id}/matches/{league_name}/line', 'PagesController@leagueLineMatches')->name('league.line');
Route::get('/league/{id}/matches/{league_name}/live', 'PagesController@leagueLiveMatches')->name('league.live');

Route::get('/bet/live/{id}', 'PagesController@liveMatch')->name('bet.live');
Route::get('/bet/line/{id}', 'PagesController@lineMatch')->name('bet.line');
