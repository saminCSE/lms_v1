<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'program_normal_image',
        'program_hover_image',
        'is_active',
    ];
}