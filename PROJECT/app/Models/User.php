<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'membership_expiry',
        'program', 
        'membership_status',
        'profile_picture', 
    ];
    

    protected $hidden = [
        'password', 'remember_token',
    ];

        // Cast the 'membership_expiry' attribute as a date
        protected $casts = [
            'membership_expiry' => 'datetime',
        ];
    
        public static function boot()
    {
        parent::boot();

        // Set default membership expiry to 1 year if null
        static::creating(function ($user) {
            if (!$user->membership_expiry) {
                $user->membership_expiry = Carbon::now()->addYear();
            }
        });
    }
}
