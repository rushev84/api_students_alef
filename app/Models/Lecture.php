<?php

namespace App\Models;

use App\Models\Curriculum;
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
}
