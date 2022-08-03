<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    
    protected $table = 'settings';
    public $timestamps = TRUE;

    protected $fillable = [
        'key',
        'value'
    ];

    public function getvalue($key)
    {
        return static::where('key', $key);
    }
}
