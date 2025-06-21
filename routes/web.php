<?php

use App\Models\Unit;
use App\Models\Prodi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BhpController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('units', UnitController::class);
Route::resource('bhps', BhpController::class);
Route::resource('prodis', ProdiController::class);
Route::resource('labs', LabController::class);
