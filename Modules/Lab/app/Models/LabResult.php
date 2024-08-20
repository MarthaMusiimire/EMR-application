<?php

namespace Modules\Lab\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lab\Database\Factories\LabResultFactory;

class labResult extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): LabResultFactory
    {
        //return LabResultFactory::new();
    }
}
