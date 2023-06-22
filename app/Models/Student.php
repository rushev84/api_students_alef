<?php

namespace App\Models;

use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
