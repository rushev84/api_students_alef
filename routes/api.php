<?php

use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('student.show');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/classes', [StudentClassController::class, 'index'])->name('student_classes');
Route::post('/classes', [StudentClassController::class, 'store'])->name('student_classes.store');
