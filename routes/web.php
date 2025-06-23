<?php

use App\Http\Controllers\AuthController;
use App\Models\Unit;
use App\Models\Prodi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BhpController;
use App\Http\Controllers\BhpRequestController;
use App\Http\Controllers\DetailRequestController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProdiController;

//route publik
Route::get('/', function () {return redirect()->route('login');});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//route akses setelah login
Route::middleware(['auth'])
    ->group(function () {

Route::get('/dashboard', function () {return view('dashboard');});

    // ------------------------------
    // CRUD UNITS
    // ------------------------------
    Route::resource('units', UnitController::class)
        ->only(['create', 'store'])
         ->middleware('permission:create-unit');

    Route::resource('units', UnitController::class)
        ->only(['edit', 'update'])
         ->middleware('permission:edit-unit');

    Route::resource('units', UnitController::class)
        ->only(['index', 'show'])
         ->middleware('permission:view-unit');
        
    Route::resource('units', UnitController::class)
        ->only(['destroy'])
         ->middleware('permission:delete-unit');

    // ------------------------------
    // CRUD BHP
    // ------------------------------
    Route::resource('bhps', BhpController::class)
        ->only(['create', 'store'])
         ->middleware('permission:create-bhp');

    Route::resource('bhps', BhpController::class)
        ->only(['edit', 'update'])
         ->middleware('permission:edit-bhp');

    Route::resource('bhps', BhpController::class)
        ->only(['index', 'show'])
         ->middleware('permission:view-bhp');
        
    Route::resource('bhps', BhpController::class)
        ->only(['destroy'])
         ->middleware('permission:delete-bhp');

    // ------------------------------
    // CRUD PRODI
    // ------------------------------
    Route::resource('prodis', ProdiController::class)
        ->only(['create', 'store'])
         ->middleware('permission:create-prodi');

    Route::resource('prodis', ProdiController::class)
        ->only(['edit', 'update'])
         ->middleware('permission:edit-prodi');

    Route::resource('prodis', ProdiController::class)
        ->only(['index', 'show'])
         ->middleware('permission:view-prodi');
        
    Route::resource('prodis', ProdiController::class)
        ->only(['destroy'])
         ->middleware('permission:delete-prodi');

    // ------------------------------
    // CRUD LAB
    // ------------------------------
    Route::resource('labs', LabController::class)
        ->only(['create', 'store'])
         ->middleware('permission:create-lab');

    Route::resource('labs', LabController::class)
        ->only(['edit', 'update'])
         ->middleware('permission:edit-lab');

    Route::resource('labs', LabController::class)
        ->only(['index', 'show'])
         ->middleware('permission:view-lab');
        
    Route::resource('labs', LabController::class)
        ->only(['destroy'])
         ->middleware('permission:delete-lab');

    // ------------------------------
    // CRUD REQUEST
    // ------------------------------
    Route::resource('bhpRequests', BhpRequestController::class)
        ->only(['create', 'store'])
         ->middleware('permission:create-request');

    Route::resource('bhpRequests', BhpRequestController::class)
        ->only(['edit', 'update'])
         ->middleware('permission:edit-request');

    Route::resource('bhpRequests', BhpRequestController::class)
        ->only(['index', 'show'])
         ->middleware('permission:view-request');
        
    Route::resource('bhpRequests', BhpRequestController::class)
        ->only(['destroy'])
         ->middleware('permission:delete-request');
    // ------------------------------
    // CRUD REQUEST
    // ------------------------------
    Route::resource('detailRequests', DetailRequestController::class)
        ->only(['create', 'store'])
         ->middleware('permission:create-request');

    Route::resource('detailRequests', DetailRequestController::class)
        ->only(['edit', 'update'])
         ->middleware('permission:edit-request');

    Route::resource('detailRequests', DetailRequestController::class)
        ->only(['index', 'show'])
         ->middleware('permission:view-request');
        
    Route::resource('detailRequests', DetailRequestController::class)
        ->only(['destroy'])
         ->middleware('permission:delete-request');


    });