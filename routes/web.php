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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard')->middleware(['auth', "checkRole:" . EMPLOYEE.":".ADMIN]);

Auth::routes();



Route::group(['middleware'=>'auth','prefix'=>'users'],function(){
    Route::get('/', 'UserController@index')->name('user-index');
    Route::view('/create','users.create')->name('user-create');
    Route::post('/store','UserController@store')->name('user-store');
    Route::get('/show/{id}','UserController@showUser')->name('user-show');
});

Route::group(['middleware'=>'checkRole:'.ADMIN ,'prefix'=>'category'],function(){
    Route::get('/', 'CategoryController@index')->name('category-index');
});

Route::middleware(['checkRole:'.ADMIN.':'.EMPLOYEE])->prefix('product')
    ->group(function () {
    Route::get('/', 'ProductController@index')->name('product-index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Test controller
Route::middleware('checkRole:'.ADMIN )->prefix('test')->group(function(){
    Route::get('/collect','TestController@testCollect')->name('test-collect');
});

Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    dd("cleared");
    dd("cleared");
    // return what you want
});


