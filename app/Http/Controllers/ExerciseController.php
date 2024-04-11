<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use Illuminate\Http\RedirectResponse;

final class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(StoreExerciseRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'instructions' => 'required',
        ]);

        $exercise = new Exercise();
        $exercise->name = $request->input('name');
        $exercise->instructions = $request->input('instructions');
        $exercise->save();

        return redirect()->route('exercise.index');
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    public function update(UpdateExerciseRequest $request, Exercise $exercise): bool
    {
        $request->validate([
            'name' => 'required',
            'instructions' => 'required',
        ]);
        $exercise->name = $request['name'];
        $exercise->instructions = $request['instructions'];
        return $exercise->save();
    }

    public function destroy(Exercise $exercise): ?bool
    {
        return $exercise->delete();
    }
}
