<?php

namespace App\Models;

use App\Models\Curriculum;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic', 'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function studentClasses()
    {
        return $this->belongsToMany(StudentClass::class, 'curriculums', 'lecture_id', 'student_class_id');
    }

}
