<?php

namespace Modules\Consultation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Consultation\Database\Factories\ConsultationFactory;

class Consultation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'symptoms',
        'duration',
        'primary_diagnosis',
        'other_diagnoses',
        'patient_id',
        'doctor_id',

    ];



    
    protected static function newFactory(): ConsultationFactory
    {
        //return ConsultationFactory::new();
    }
}
