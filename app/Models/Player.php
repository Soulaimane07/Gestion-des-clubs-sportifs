<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'CNI',
        'CNIImage',
        'attestation',
        'CNE',
        'image',
        'fname',
        'lname',
        'etab',
        'filier',
        'tournoie',
    ];
}
