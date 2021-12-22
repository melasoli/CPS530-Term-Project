<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/install', function () {
    return view('install');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/conclusion', function () {
    return view('conclusion');
});

Route::get('/credits', function () {
    return view('credits');
});