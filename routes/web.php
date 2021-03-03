<?php


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();


    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
    Route::get('/students', 'Admin\StudentController@index')->name('admin.students.index');
    Route::get('/students/create', 'Admin\StudentController@create')->name('admin.students.create');
    Route::post('/students/store', 'Admin\StudentController@store')->name('admin.students.store');
