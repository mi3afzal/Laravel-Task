<?php

    Route::get('/', 'TaskController@index');

    Route::post('/task/create','TaskController@create')->name('task.create');

    Route::delete('/task/{task}', 'TaskController@destroy')->name('task.destroy');