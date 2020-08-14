<?php

use Illuminate\Support\Facades\Route;
use Illuminate\support\facades\Redis;

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

Route::get('/ ', function () {
  // codes for redis
 // $redis = app()->make('redis')
  // Redis::set('name' , 'nasaria');
  
  // Redis ::set ('gender' ,'female');
  // $name = Redis::get ('name');
  // $age = Redis::get ('age');
  // $gender = REdis ::get ('gender');
  // print("name: $name\n");
  // print("age: $age");
  // print("gender: $gender"); 
    return view('welcome');
});

//     Route::get('/about', function(){
//        return view ('pages.about');
//     });

// Route:: get ('/home ',function(){
//    return view ('pages.home');
// });


Route::get('/home', 'HomeController@index')->name('home');

 Route::resource('/tasks','taskscontroller', ['names' => [
    'index' => 'tasks.index',
    'edit' => 'tasks.edit',
    'create' => 'tasks.create',
    'show' => 'tasks.show',
 ]])->middleware('auth');
Route::get('tasks/delete/{id}', 'TasksController@destroy')->name('tasks.delete');
