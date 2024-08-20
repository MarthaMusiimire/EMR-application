<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'role',
        
    
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function medicalRecords()
    // {
    //     return $this->hasMany(MedicalRecords::class);
    // }

    // public function authenticatedLabTests()
    // {
    //     return $this->hasMany(LabTest::class, 'authenticated_by');
    // }

    // public function appointments()
    // {
    //     return $this->hasMany(Appointments::class, 'user_id');
    // }









    protected static function newFactory(): UserFactory
    {
        //return UserFactory::new();
    }
}
