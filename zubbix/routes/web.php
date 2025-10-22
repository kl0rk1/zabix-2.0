<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');
Route::post('/createdevices', [DeviceController::class, 'store'])->name('devices.store');
Route::post('/devices/ping/{id}', [DeviceController::class, 'ping'])->name('devices.ping');
Route::get('/createdevices', function () {
    return view('createdevices');
});