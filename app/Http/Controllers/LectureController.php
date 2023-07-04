<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Services\Lecture\LectureService;

class LectureController extends Controller
{
    protected $lectureService;

    public function __construct(LectureService $lectureService)
    {
        $this->lectureService = $lectureService;
    }

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
        $lecture = $this->lectureService->getLectureWithClassesAndStudents($id);

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
