<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteCode extends Model
{
    use HasFactory;
    
    protected $table = 'invite_code';
    public $timestamps = TRUE;

    protected $fillable = [
        'invite_code'
    ];
}
