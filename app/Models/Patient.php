<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'phone_number',
        'next_of_kin_name',
        'relationship',
        'next_of_kin_phone_number'
    ];
}
