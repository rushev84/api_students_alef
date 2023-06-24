<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Curriculum;
use App\Models\StudentClass;
use Illuminate\Support\Facades\DB;
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

    public function show(int $id)
    {
        $student_class = StudentClass::with('students')->findOrFail($id);

        return response()->json($student_class);
    }

    public function showWithCurriculum(int $id)
    {
        // $student_class = StudentClass::with('curriculums.lecture')->findOrFail($id);

        $student_class = StudentClass::with('curriculums.lecture')->findOrFail($id);
        $sorted_curriculums = collect($student_class->curriculums)->sortBy('order')->values()->all();

        // ПРОБЛЕМА! массив моделей отсортирован, а в json сортировки нет
        $student_class->curriculums = $sorted_curriculums;

        return response()->json($student_class);
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

    public function destroy(int $id)
    {
        $student_class = StudentClass::findOrFail($id);

        // вынести в сервис
        Student::where('student_class_id', $id)->update(['student_class_id' => null]);

        DB::table('curriculums')->where('student_class_id', $id)->delete();

        $student_class->delete();

        return response()->json([
            'message' => 'Класс успешно удалён!',
        ]);
    }
}
