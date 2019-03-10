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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');
Route::resource('chats', 'ChatController');
Route::resource('friends', 'FriendController');
Route::resource('games', 'GameController');
Route::resource('user_games', 'User_gameController');
Route::resource('ranks', 'RankController');
