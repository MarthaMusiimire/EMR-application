<?php

namespace Modules\Appointment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Appointment\Database\Factories\AppointmentFactory;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'patient_id',
        'clinic_id',
        'user_id',
        'clinical_notes',
        'appointment_date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    protected static function newFactory(): AppointmentFactory
    {
        //return AppointmentFactory::new();
    }
}
