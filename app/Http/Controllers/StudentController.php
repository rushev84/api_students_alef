<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Student;
use App\Models\Curriculum;
use Illuminate\Http\Request;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Validator;
use App\Http\Requests\CreateStudentRequest;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    protected function failedValidation(Validator $validator)
    {
        return new ValidationException($validator, response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ]));
    }

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

    public function store(CreateStudentRequest $request): \Illuminate\Http\JsonResponse
    {
        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'student_class_id' => $request->input('student_class_id'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Студент успешно создан!',
        ]);
    }
}

