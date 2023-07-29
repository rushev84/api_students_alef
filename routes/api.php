<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentClassController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return "<b>Добро пожаловать в API университета!</b><br> Инструкция для работы с API <a href='https://github.com/rushev84/api_students_alef'>здесь</a>.";
});

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('student.show');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/classes', [StudentClassController::class, 'index'])->name('student_classes');
Route::get('/classes/{id}', [StudentClassController::class, 'show'])->name('student_classes.show');
Route::get('/classes/{id}/curriculum', [StudentClassController::class, 'showWithCurriculum'])->name('student_classes.show_with_curriculum');
Route::post('/classes', [StudentClassController::class, 'store'])->name('student_class.store');
Route::put('/classes/{id}', [StudentClassController::class, 'update'])->name('student_class.update');
Route::delete('/classes/{id}', [StudentClassController::class, 'destroy'])->name('student_class.destroy');

Route::get('/lectures', [LectureController::class, 'index'])->name('lectures');
Route::get('/lectures/{id}', [LectureController::class, 'show'])->name('lecture.show');
Route::post('/lectures', [LectureController::class, 'store'])->name('lecture.store');
Route::put('/lectures/{id}', [LectureController::class, 'update'])->name('lecture.update');
Route::delete('/lectures/{id}', [LectureController::class, 'destroy'])->name('lecture.destroy');
