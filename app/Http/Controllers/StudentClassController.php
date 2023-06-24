<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function index()
    {
        $student_classes = StudentClass::all();

        return response()->json($student_classes);
    }

}
