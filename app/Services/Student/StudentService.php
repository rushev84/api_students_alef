<?php

namespace App\Services\Student;

use App\Models\Lecture;
use App\Models\Student;
use App\Models\Curriculum;

class StudentService
{
    // public function getStudentWithClassAndLectures(int $id): Student
    // {
    //     $student = Student::findOrFail($id);

    //     $curriculums = Curriculum::where('student_class_id', $student->studentClass->id)
    //         ->get();

    //     $lectureIds = $curriculums
    //         ->pluck('lecture_id')
    //         ->toArray();

    //     $lectures = Lecture::whereIn('id', $lectureIds)
    //         ->get();

    //     $student->setAttribute('student_class', $student->studentClass->name);
    //     $student->setAttribute('lectures', $lectures->toArray());

    //     return $student;
    // }

    public function getStudentWithClassAndLectures(int $id): Student
    {
        $student = Student::with('studentClass.curriculums.lecture')->findOrFail($id);

        $studentClass = $student->studentClass;
        $studentClass->makeHidden(['curriculums']);

        $student->setAttribute('student_class', $studentClass);
        $student->setAttribute('lectures', $student->studentClass->curriculums->pluck('lecture')->toArray());

        return $student;
    }

}
