<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'batchName',
        'courseId',
        'courseStartDate',
        'courseEndDate',
        'status',
        'publishDate',
        'price',
        'seatNo',
        'examDate',
        'enrollmentDate',
        'is_active',
    ];
}
