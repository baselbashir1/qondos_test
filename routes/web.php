<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaintenanceTechnicianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/clients', 'index');
        Route::get('/client/{client}/details', 'show');
        Route::get('/client/add', 'create');
        Route::post('/add-client', 'store');
        Route::get('/client/{client}/edit', 'edit');
        Route::post('/edit-client/{client}', 'update');
        Route::post('/delete-client/{client}', 'destroy');
    });

    Route::controller(MaintenanceTechnicianController::class)->group(function () {
        Route::get('/maintenance-technicians', 'index');
        Route::get('/maintenance-technician/{maintenance-technician}/details', 'show');
        Route::get('/maintenance-technician/add', 'create');
        Route::post('/add-maintenance-technician', 'store');
        Route::get('/maintenance-technician/{maintenanceTechnician}/edit', 'edit');
        Route::post('/edit-maintenance-technician/{maintenanceTechnician}', 'update');
        Route::post('/delete-maintenance-technician/{maintenanceTechnician}', 'destroy');
    });
});

require __DIR__ . '/auth.php';
