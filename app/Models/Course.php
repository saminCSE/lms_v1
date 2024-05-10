<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_description',
        'abstract',
        'biblography',
        'syllabusId',
        'programsId',
        'course_duration',
        'start_time',
        'end_time',
        'course_image_1',
        'course_price',
        'is_active',
    ];

    public function sections()
    {
        return $this->hasMany(CourseSection::class, 'course_id');
    }

    public function lectures()
    {
        return $this->hasMany(CourseLecture::class, 'course_id');
    }
}
