<?php

namespace Modules\Lab\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lab\Database\Factories\LabTestFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class labTest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'test_name',
        'duration',
        'results',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected static function newFactory(): LabTestFactory
    {
        //return LabTestFactory::new();
    }
}
