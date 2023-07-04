<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\JsonResponse;

class LectureController extends Controller
{
    public function index(): JsonResponse
    {
        $lectures = Lecture::all();

        return response()->json($lectures);
    }
}
