<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');   
});
Route::get('/helloWorld', function () {
        return 'hello world';
});
Route::get('/hello/{param}', function ($param) {
        return 'hello ' . $param;
});

Route::get('/test', function () {
    return 'test rout';
});