<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $hidden = [
        'student_class_id', 'lecture_id',
        'created_at', 'updated_at',
    ];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
