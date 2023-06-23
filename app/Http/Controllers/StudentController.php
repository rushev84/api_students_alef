<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Student;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function store(Request $request): string
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'max:255', 'regex:/^[^0-9]*$/'],
                'email' => 'required|email|unique:students,email',
                'student_class_id' => 'required|integer|exists:student_classes,id',
            ]);

            $student = new Student;
            $student->name = $validated['name'];
            $student->email = $validated['email'];
            $student->student_class_id = $validated['student_class_id'];
            $student->save();

            return 'Студент успешно создан!';

        } catch (ValidationException $e) {
            return $e->getMessage();
        }
    }
}

