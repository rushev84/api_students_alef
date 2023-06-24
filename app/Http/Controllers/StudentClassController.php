<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Http\Requests\CreateStudentClassRequest;
use App\Http\Requests\UpdateStudentClassRequest;

class StudentClassController extends Controller
{
    public function index()
    {
        $student_classes = StudentClass::all();

        return response()->json($student_classes);
    }

    public function store(CreateStudentClassRequest $request)
    {
        StudentClass::create([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Класс успешно создан!',
        ]);
    }

    public function update(int $id, UpdateStudentClassRequest $request)
    {
        $student_class = StudentClass::findOrFail($id);

        $student_class->update([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Класс успешно обновлён!',
        ]);
    }
}
