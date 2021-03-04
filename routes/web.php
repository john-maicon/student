<?php

Route::get('/', function () {
    return redirect('/students');
});

Route::middleware('auth')->group(function () {
    Route::get('/students', 'Admin\StudentController@index')->name('admin.students.index');
    Route::get('/students/create', 'Admin\StudentController@create')->name('admin.students.create');
    Route::get('/students/{student}', 'Admin\StudentController@edit')->name('admin.students.edit');
    Route::post('/students/store', 'Admin\StudentController@store')->name('admin.students.store');
    Route::put('/students/update/{student}', 'Admin\StudentController@update')->name('admin.students.update');
    Route::delete('/students/{student}', 'Admin\StudentController@destroy')->name('admin.students.destroy');
});

Auth::routes(['register' => false]);
