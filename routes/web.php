<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicantController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->name('todolist.create');
Route::post('/store', [HomeController::class, 'store'])->name('todolist.store');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('todolist.edit');
Route::get('/update/{id}', [HomeController::class, 'delete'])->name('todolist.delete');
Route::post('/update', [HomeController::class, 'update'])->name('todolist.update');

Route::get('/view', [HomeController::class, 'view'])->name('view');

//Job application
Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicants.index');
Route::get('/application/create', [ApplicantController::class, 'create'])->name('applicants.create');
Route::post('/applicants.store', [ApplicantController::class, 'store'])->name('applicants.store');
Route::get('/application/edit/{id}', [ApplicantController::class, 'edit'])->name('applicants.edit');
Route::get('/application/update/{id}', [ApplicantController::class, 'delete'])->name('applicants.delete');

