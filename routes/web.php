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

Route::get('/', [
    'uses'  => 'App\Http\Controllers\PagesController@index',
    'as'    => 'main',
    ]);
Auth::routes();


Route::get('password/reset', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Route::match(['get', 'post'], 'register', function(){
    return abort(404);
});
Route::match(['get', 'post'], 'password/reset', function(){
    return abort(404);
});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('admin.home');

Route::group(['middleware'=>['auth','verified'],'prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin\\'], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('activitylogs', ['as' => 'activitylogs', 'uses' => 'DashboardController@allActivityLogs']);

    include __DIR__ . DIRECTORY_SEPARATOR . 'admin.php';

});

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {

    Route::get('/change-password', [
        'as'    => 'change-password',
        'uses'  => 'App\Http\Controllers\Auth\ProfileController@showPasswordForm'
        ]);

    Route::post('/change-password', [
        'as'    => 'submit-password',
        'uses'  => 'App\Http\Controllers\Auth\ProfileController@changePassword'
        ]);

    Route::resource('profile', 'App\Http\Controllers\Auth\ProfileController')->only('index');


});
