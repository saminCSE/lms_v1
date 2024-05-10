<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'courseId',
        'batchId',
        'studentId',
        'studentEmail',
        'enrollmentDate',
        'enrollStatus',
        'cancellationReason',
        'paymentStatus',
        'contactStatus',
        'amount',
    ];
}
