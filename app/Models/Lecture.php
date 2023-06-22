<?php

namespace App\Models;

use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecture extends Model
{
    use HasFactory;

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
}
