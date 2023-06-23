<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\Student\StudentService;
use \Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(): JsonResponse
    {
        $students = Student::all();

        return response()->json($students);
    }

    public function show(int $id): JsonResponse
    {
        $student = $this->studentService->getStudentWithClassAndLectures($id);

        // dd($student);

        return response()->json($student);
    }

    public function store(CreateStudentRequest $request): JsonResponse
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

    public function update(int $id, UpdateStudentRequest $request): JsonResponse
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

    public function destroy(int $id): JsonResponse
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'message' => 'Студент успешно удалён!',
        ]);
    }
}

