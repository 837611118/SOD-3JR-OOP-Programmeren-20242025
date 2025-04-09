<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/helloKoppelingen', function () {
    return 'hello world';
});

Route::get('/hello/{param}', function ($param) {
    return 'hello ' . $param;
});


?>