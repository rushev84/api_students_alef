<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    use HasFactory;

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function lectures()
    {
        return $this->belongsTo(Lecture::class);
    }
}
