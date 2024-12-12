<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return File::get(public_path().'/fe/index.html');
});

Route::get('/fe/{path?}', function () {
    return File::get(public_path().'/shop/index.html');
})->where("path", ".+");

