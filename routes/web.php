<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\RekonController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', [DashboardController::class, 'index']);

Route::post('/login', [DashboardController::class, 'login']);

Route::post('/getData', [DataController::class, 'getData']);

Route::post('/getRekonNaik', [RekonController::class, 'getRekon']);

Route::get('/', function () {
    return view('dashboard-transaksi');
})->name('dashboard.transaksi');

Route::get('/dashboard-rekon', function () {
    return view('dashboard-rekon');
})->name('dashboard.rekon');

Route::get('/proses-rekon', function () {
    return view('proses-rekon');
})->name('proses.rekon');