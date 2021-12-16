<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/tas', function () {
//     $user = auth()->user();
//    return view('tasks.index', [
//      'tasks' => $user->hasMany(Task::class)->get();]
//     );y
//  });
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', '\App\Http\Controllers\TaskController@index')->name('tasks.index')->middleware('auth');
Route::post('/tasks', '\App\Http\Controllers\TaskController@store')->name('tasks.store')->middleware('auth');
Route::get('/tasks/{id}', '\App\Http\Controllers\TaskController@edit')->name('tasks.edit')->middleware('auth');
Route::delete('/tasks/{id}', '\App\Http\Controllers\TaskController@destroy')->name('tasks.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');