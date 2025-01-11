<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameoftollCRUD;

Route::resource('nameoftools', NameoftollCRUD::class);


Route::get('/', function () {
    return view('welcome');
});
