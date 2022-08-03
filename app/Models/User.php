<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{ 
    use HasApiTokens, HasFactory, Notifiable;

    /* @var array
     */
   
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_key_limit',
        'invite_code',
        'ip_address',
        'registered_UUID'
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
   

    public function licenseKeys()
    {
        return $this->hasMany('App\Models\LicenseApi');
    }
   
    public function userLogs()
    {
        return $this->hasMany('App\Models\ActivityLog','causer_id','id');
    }
    }
