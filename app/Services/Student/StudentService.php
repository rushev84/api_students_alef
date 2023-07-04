<?php

namespace App\Services\Student;

use App\Models\Student;

class StudentService
{
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
