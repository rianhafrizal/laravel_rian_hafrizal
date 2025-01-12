<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OutletController;

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


Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');
Route::get('outlet/list.json',[OutletController::class,'Getlist4form'])->name('list.outlet');
Route::get('outlet/byid',[OutletController::class,'GetOutletByid'])->name('outlet.byid');
Route::post('outlet/store',[OutletController::class,'store'])->name('outlet.store');
Route::post('outlet/update',[OutletController::class,'update'])->name('outlet.update');
Route::post('outlet/delete',[OutletController::class,'delete'])->name('outlet.delete');



Route::get('/tes', function () {
    return terbilang(200000307);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
