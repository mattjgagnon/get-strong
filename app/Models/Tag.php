<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    public const TYPE_EXERCISE = 'exercise';
    public const TYPE_SESSION = 'session';
    public const TYPE_SET = 'set';
    public const TYPE_USER = 'user';
    public const TYPES = [
        self::TYPE_EXERCISE,
        self::TYPE_SESSION,
        self::TYPE_SET,
        self::TYPE_USER,
    ];
}
