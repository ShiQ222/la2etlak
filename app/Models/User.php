<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
	
	
    // Define role constants
    public const ROLE_USER = 'user';
    public const ROLE_MODERATOR = 'moderator';
    public const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'name',
    'email',
    'password',
    'is_subscribed',        // Field for subscription status
    'subscription_date',    // Field for subscription date
    'expiry_date',          // Field for subscription expiry date
    'role',                 // Field for user role
    'phone',                // New field for phone number
    'address',              // New field for address
    'country',              // New field for country
    'dob',                  // New field for date of birth
    'is_active',            // New field for account active status
];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'subscription_date' => 'date', // Casting to date
        'expiry_date' => 'date',       // Casting to date
    ];
}
