<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkoutController extends Controller
{
    protected Workout $workout;

    public function __construct(Workout $workout)
    {
        $this->workout = $workout;
    }

    public function index(): Response
    {
    }

    public function create(): Response
    {
    }

    public function store(Request $request)
    {
        $this->workout->name = $request->name;
        return $this->workout->save();
    }

    public function show(WorkoutController $workoutController): Response
    {
    }

    public function edit(WorkoutController $workoutController): Response
    {
    }

    public function update(Request $request, WorkoutController $workoutController): Response
    {
    }

    public function destroy(WorkoutController $workoutController): Response
    {
    }
}
