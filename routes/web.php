<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('l5-swagger::index');
});

