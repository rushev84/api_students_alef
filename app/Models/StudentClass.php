<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
}
