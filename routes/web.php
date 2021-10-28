<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\DiemdungController;
use App\Http\Controllers\SoHuuController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::get('/Admin/sohuu',[SoHuuController::class,'index'])->name('Admin/sohuu.index');
Route::get('/Admin/sohuu/create',[SoHuuController::class,'create'])->name('Admin/sohuu.create');
Route::post('/Admin/sohuu/create',[SoHuuController::class,'store'])->name('Admin/sohuu.store');
Route::get('/Admin/sohuu/edit/{id}',[SoHuuController::class,'edit'])->name('Admin/sohuu.edit');
Route::put('/Admin/sohuu/update/{id}',[SoHuuController::class,'update'])->name('Admin/sohuu.update');

Route::get('/Admin/bus',[BusController::class,'index'])->name('Admin/bus.index');
Route::get('/Admin/bus/create',[BusController::class,'create'])->name('Admin/bus.create');
Route::post('/Admin/bus/create',[BusController::class,'store'])->name('Admin/bus.store');
Route::get('/Admin/bus/edit/{id}',[BusController::class,'edit'])->name('Admin/bus.edit');
Route::put('/Admin/bus/update/{id}',[BusController::class,'update'])->name('Admin/bus.update');

Route::get('/Admin/diemdung',[DiemdungController::class,'index'])->name('Admin/diemdung.index');
Route::get('/Admin/diemdung/create',[DiemdungController::class,'create'])->name('Admin/diemdung.create');
Route::post('/Admin/diemdung/create',[DiemdungController::class,'store'])->name('Admin/diemdung.store');
Route::get('/Admin/diemdung/edit/{id}',[DiemdungController::class,'edit'])->name('Admin/diemdung.edit');
Route::put('/Admin/diemdung/update/{id}',[DiemdungController::class,'update'])->name('Admin/diemdung.update');
Route::get('/diemdung/apiData',[DiemdungController::class,'apiData'])->name('apiData');
Route::get('/viewMap',[DiemdungController::class,'viewMap'])->name('viewMap');