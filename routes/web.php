<?php

use App\Http\Controllers\mycontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students','studentcontroller');
