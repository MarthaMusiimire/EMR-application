<?php

namespace Modules\Patient\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Patient\Database\Factories\PatientFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
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

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->file_number = 'MGM-' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        });
    }


    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecords::class);
    }

    

    //created by fields, routes, commenting code, uniform flow,

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // protected static function newFactory(): PatientFactory
    // {
    //     //return PatientFactory::new();
    // }
}
