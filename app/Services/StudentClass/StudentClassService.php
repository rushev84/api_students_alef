<?php

namespace App\Services\StudentClass;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Support\Facades\DB;


class StudentClassService
{
    public function destroyStudentClass(int $id)
    {
        $student_class = StudentClass::findOrFail($id);

        Student::where('student_class_id', $id)->update(['student_class_id' => null]);

        DB::table('curriculums')->where('student_class_id', $id)->delete();

        $student_class->delete();
    }

}
