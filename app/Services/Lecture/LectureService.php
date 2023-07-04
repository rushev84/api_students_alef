<?php

namespace App\Services\Lecture;

use App\Models\Lecture;

class LectureService
{
    public function getLectureWithClassesAndStudents(int $id): Lecture
    {
        $lecture = Lecture::with('studentClasses.students')->findOrFail($id);

        $lecture->studentClasses->transform(function ($studentClass) {
            unset($studentClass->pivot);
            return $studentClass;
        });

        return $lecture;
    }

}
