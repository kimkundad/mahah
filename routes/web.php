<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomAuthController;

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



Auth::routes();

Route::get('/images/{file}', function ($file) {
	$url = Storage::disk('do_spaces')->temporaryUrl(
	  $file,
	  now()->addMinutes(5)
	);
	if ($url) {
	   return Redirect::to($url);
	}
	return abort(404);
  })->where('file', '.+');

  
Route::get('/call_percent', [App\Http\Controllers\ApiController::class, 'call_percent'])->name('call_percent');

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Route::get('/games/{id}', [App\Http\Controllers\HomeController::class, 'games'])->name('games');

Route::get('/rooms', [App\Http\Controllers\HomeController::class, 'rooms'])->name('rooms');
Route::get('/rooms_slot', [App\Http\Controllers\HomeController::class, 'rooms_slot'])->name('rooms_slot');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 

Route::get('/game-room-{id}-{room}', [App\Http\Controllers\HomeController::class, 'game_room'])->name('game_room');

Route::get('/rooms/room_percents', [App\Http\Controllers\HomeController::class, 'room_percents'])->name('room_percents');
Route::get('/api/game/online_user', [App\Http\Controllers\HomeController::class, 'online_user'])->name('online_user');

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::resource('/admin/MyUser', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);
    Route::get('admin/users_search/', [App\Http\Controllers\MyUserController::class, 'users_search']);

    Route::resource('/admin/category', CategoryController::class);
    Route::post('/api/api_post_status_category', [App\Http\Controllers\CategoryController::class, 'api_post_status_category']);
    Route::get('api/del_cat/{id}', [App\Http\Controllers\CategoryController::class, 'del_cat']);

    Route::resource('/admin/games', GameController::class);
    Route::post('/api/api_post_status_games', [App\Http\Controllers\GameController::class, 'api_post_status_games']);
    Route::get('api/del_games/{id}', [App\Http\Controllers\GameController::class, 'del_games']);

    Route::get('admin/setting/', [App\Http\Controllers\SettingController::class, 'index']);
    Route::post('api/post_setting/', [App\Http\Controllers\SettingController::class, 'post_setting']);

    Route::get('/admin/room/create/{id}', [App\Http\Controllers\GameController::class, 'create_new']);

    Route::resource('/admin/rooms', RoomController::class);
    Route::post('/api/api_post_status_rooms', [App\Http\Controllers\RoomController::class, 'api_post_status_rooms']);
    Route::get('api/del_rooms/{id}', [App\Http\Controllers\RoomController::class, 'del_rooms']);

});
