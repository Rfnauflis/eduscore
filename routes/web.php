<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.sign-in');
});

Route::get('dashboard/index', function () {
    return view('dashboard.index');
});
