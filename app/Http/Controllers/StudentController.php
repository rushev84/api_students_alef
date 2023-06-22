<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $student = Student::findOrFail($id);

        $student->setAttribute('student_class', $student->studentClass->name);

        $example = Curriculum::all();

        // dd($example);

        return response()->json($student);
    }

}

