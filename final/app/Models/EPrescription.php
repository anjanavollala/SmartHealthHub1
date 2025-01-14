<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPrescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription',
        'dosage',
        'instructions',
        'date_prescribed', 
    ];
}
