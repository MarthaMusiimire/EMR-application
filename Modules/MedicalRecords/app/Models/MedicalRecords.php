<?php

namespace Modules\MedicalRecords\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MedicalRecords\Database\Factories\MedicalRecordsFactory;

class medicalRecords extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];






    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    protected static function newFactory(): MedicalRecordsFactory
    {
        //return MedicalRecordsFactory::new();
    }
}


