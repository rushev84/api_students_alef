<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Student;
use App\Models\Curriculum;

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

        $curriculums = Curriculum::where('student_class_id', $student->studentClass->id)
            ->get();

        $lectureIds = $curriculums
            ->pluck('lecture_id')
            ->toArray();

        $lectures = Lecture::whereIn('id', $lectureIds)
            ->get();

        $student->setAttribute('student_class', $student->studentClass->name);
        $student->setAttribute('lectures', $lectures->toArray());

        return response()->json($student);
    }
}

