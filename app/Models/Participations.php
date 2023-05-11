<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participations extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournoie',
        'etab',
    ];
}
