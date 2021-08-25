<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    protected Workout $workout;

    public function __construct(Workout $workout)
    {
        $this->workout = $workout;
    }

    public function store(Request $request)
    {
        $this->workout->name = $request->name;
        return $this->workout->save();
    }
}
