<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Set extends Model
{
    use HasFactory;


    protected $fillable = [
        'number',
        'weight',
        'repetitions',
        'duration',
        'notes',
    ];
    protected $casts = [
        'number' => 'int',
        'weight' => 'int',
        'repetitions' => 'int',
        'duration' => 'int',
    ];
}
