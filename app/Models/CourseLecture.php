<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLecture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'lecture_id');
    }
}
