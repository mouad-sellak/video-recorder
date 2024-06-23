<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

Route::post('/videos', [VideoController::class, 'store']);
Route::get('/videos/{video}', [VideoController::class, 'show']);
Route::get('/videos', [VideoController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
