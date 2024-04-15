<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdherenceMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'medication',
        'date',
        'adherence', 
    ];
}
