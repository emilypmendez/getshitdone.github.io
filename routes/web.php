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
Route::view('/dashboard', 'dashboard.index')->middleware('auth')->name('dashboard');

// Viewing objectives
Route::get('/objectives', 'Objective\ListController')->name('objectives.index');
Route::get('/objectives/create', 'Objective\CreateController')->name('objectives.create');
Route::get('/objectives/priority', 'Objective\PriorityController')->name('objectives.priority.create');
Route::get('/objectives/schedule', 'Objective\ScheduleController')->name('objective.schedule.create');

// Adding to objectives
Route::post('/objectives', 'Objective\StoreController')->name('objectives.store');

// Manipulating objectives
Route::post('/objectives/{objective}/priority', 'Objective\UpdatePriorityController')->name('objectives.priority.update');
Route::post('/objectives/{objective}/schedule', 'Objective\UpdateScheduleController')->name('objectives.schedule.update');

// Deleting objectives
Route::post('/objectives/{objective}', 'Objective\RemoveController')->name('objectives.prioritize.update');