<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseApi extends Model
{
    use HasFactory;

    protected $table = 'license_api';
    public $timestamps = TRUE;

    protected $fillable = [
        'api_key',
        'user_id'
    ];
    public function license_user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    
    
}
