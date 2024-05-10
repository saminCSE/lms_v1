<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'StudentName',
        'Email',
        'password',
        'BirthDate',
        'PhoneNo',
        'email_verification_code',
        'email_verified'
    ];
}
