<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentUpload extends Model
{
    use HasFactory;
    protected $table ='assignments_upload';
    protected $fillable = [
        'title',
        'courseId',
        'batchId',
        'classId',
        'teacherId',
        'assignmentDate',
        'status',
        'file',
    ];
}
