<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/',[StudentController::class , 'index'])->name('list.student');
Route::get('/student/add',[StudentController::class , 'addStudent'])->name('add.student');
Route::post('/student/create',[StudentController::class , 'createStudent'])->name('create.student');
Route::get('/student/edit/{id}',[StudentController::class , 'editStudent'])->name('edit.student');
Route::post('/student/update',[StudentController::class , 'updateStudent'])->name('update.student');
Route::get('/student/delete/{id}',[StudentController::class , 'deleteStudent'])->name('delete.student');

