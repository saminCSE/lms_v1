<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $fillable = [
        'courseId',
        'batchId',
        'classNo',
        'studentId',
        'is_present'
    ];

}
