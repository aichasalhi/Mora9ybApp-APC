<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:administrator', 'prefix' => 'adinistrator', 'as' => 'adinistrator.'], function() {
        Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);
    });
    Route::group(['middleware' => 'role:supervisor', 'prefix' => 'supervisor', 'as' => 'supervisor.'], function() {
        Route::resource('supervisor', \App\Http\Controllers\supervisor\SupervisorController::class);
    });
});


//Route::get('trytask',[App\Http\Controllers\AdminController::class,'try']);
// Route::resource('admintask', App\Http\Controllers\AdminController::class);
Route::resource('officetask', App\Http\Controllers\OfficeController::class);
Route::resource('centretask', App\Http\Controllers\CtdresultController::class);
Route::resource('communetask', App\Http\Controllers\CmdresultController::class);
Route::resource('task', App\Http\Controllers\RequetesController::class);
Route::resource('centresub', App\Http\Controllers\CentreController::class);

// Route::resource('Wresult', App\Http\Controllers\Admin\AdminController::class);
// Route::resource('Comresult', App\Http\Controllers\CommuneController::class);

