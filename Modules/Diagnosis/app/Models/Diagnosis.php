<?php

namespace Modules\Diagnosis\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Diagnosis\Database\Factories\DiagnosisFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'diagnosis_name',
        'icd_code',  
    ];
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected static function newFactory(): DiagnosisFactory
    {
        //return DiagnosisFactory::new();
    }
}
