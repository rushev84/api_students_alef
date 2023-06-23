<?php

namespace App\Models;

use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email',
        'student_class_id',
    ];

    protected $hidden = [
        'student_class_id',
        'created_at', 'updated_at',
    ];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
