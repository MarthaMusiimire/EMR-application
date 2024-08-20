<?php

namespace Modules\Pharmacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pharmacy\Database\Factories\DrugFactory;

class Drug extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'drug_name',
        'brand_name',
        'form',
        'code',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = 'NDC-DRG-01' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        });
    }

    protected static function newFactory(): DrugFactory
    {
        //return DrugFactory::new();
    }
}
