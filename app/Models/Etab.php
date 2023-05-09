<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etab extends Model
{
    use HasFactory;

    protected $fillable = [
        'etab',
        'bref',
        'image',
    ];
}
