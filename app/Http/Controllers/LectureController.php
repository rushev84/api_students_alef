<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateLectureRequest;
use App\Http\Requests\UpdateLectureRequest;

class LectureController extends Controller
{
    public function index(): JsonResponse
    {
        $lectures = Lecture::all();

        return response()->json($lectures);
    }

    public function store(CreateLectureRequest $request): JsonResponse
    {
        Lecture::create([
            'topic' => $request->input('topic'),
            'description' => $request->input('description'),
        ]);

        return response()->json([
            'message' => 'Лекция успешно создана!',
        ]);
    }

    public function show(int $id)
    {
        $lecture = Lecture::with('studentClasses.students')->findOrFail($id);

        $lecture->studentClasses->transform(function ($studentClass) {
            unset($studentClass->pivot);
            return $studentClass;
        });

        return response()->json($lecture);
    }

    public function update(int $id, UpdateLectureRequest $request): JsonResponse
    {
        $lecture = Lecture::findOrFail($id);

        $lecture->update([
            'topic' => $request->input('topic'),
            'description' => $request->input('description'),
        ]);

        return response()->json([
            'message' => 'Лекция успешно обновлена!',
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $lecture = Lecture::findOrFail($id);

        $lecture->delete();

        return response()->json([
            'message' => 'Лекция успешно удалена!',
        ]);
    }
}
