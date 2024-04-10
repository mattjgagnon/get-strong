<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class ExerciseSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
    ];
}
