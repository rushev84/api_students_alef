<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Student;
use App\Models\Curriculum;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

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

    public function store(CreateStudentRequest $request): \Illuminate\Http\JsonResponse
    {
        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'student_class_id' => $request->input('student_class_id'),
        ]);

        return response()->json([
            'message' => 'Студент успешно создан!',
        ]);
    }

    public function update(int $id, UpdateStudentRequest $request): \Illuminate\Http\JsonResponse
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->input('name'),
            'student_class_id' => $request->input('student_class_id'),
        ]);

        return response()->json([
            'message' => 'Студент успешно обновлён!',
        ]);
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'message' => 'Студент успешно удалён!',
        ]);
    }
}

