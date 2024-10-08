<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Admin/sign-in', function () {
    return view('Admin.sign-in');
});
