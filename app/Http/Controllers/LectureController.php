<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateLectureRequest;

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

    public function destroy(int $id): JsonResponse
    {
        $lecture = Lecture::findOrFail($id);

        $lecture->delete();

        return response()->json([
            'message' => 'Лекция успешно удалена!',
        ]);
    }
}
