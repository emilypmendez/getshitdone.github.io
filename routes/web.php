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

// Authentication
Auth::routes();

// Home pages
Route::view('/', 'home.index')->middleware('guest')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::view('/dashboard', 'dashboard.index')->middleware('auth')->name('dashboard');

    // Viewing objectives
    Route::get('/objectives', 'Objective\ListController')->name('objectives.index');
    Route::get('/objectives/create', 'Objective\CreateController')->name('objectives.create');
    Route::get('/objectives/priority', 'Objective\PriorityController')->name('objectives.priority.create');
    Route::get('/objectives/schedule', 'Objective\ScheduleController')->name('objectives.schedule.create');

    // Adding to objectives
    Route::post('/objectives', 'Objective\StoreController')->name('objectives.store');

    // Manipulating objectives
    Route::patch('/objectives/{objective}/priority', 'Objective\UpdatePriorityController')->name('objectives.priority.update');
    Route::patch('/objectives/{objective}/schedule', 'Objective\UpdateScheduleController')->name('objectives.schedule.update');

    // Deleting objectives
    Route::delete('/objectives/{objective}', 'Objective\RemoveController')->name('objectives.prioritize.update');
});