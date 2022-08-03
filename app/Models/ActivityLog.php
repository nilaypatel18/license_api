<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    
    protected $table = 'activity_log';
    public $timestamps = TRUE;

    protected $fillable = [
        'key',
        'value'
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User','id','causer_id');
    }
}
