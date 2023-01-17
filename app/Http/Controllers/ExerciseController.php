<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class ExerciseController extends Controller
{
    public function index(): string
    {
        return Exercise::all();
    }

    public function store(Request $request): string
    {
        $request->validate([
            'name' => 'required',
            'instructions' => 'required',
        ]);

        return Exercise::create($request->all())->toJson();
    }

    public function show(Exercise $exercise): Collection
    {
        return Exercise::find($exercise);
    }

    public function update(Request $request, Exercise $exercise): bool
    {
        $request->validate([
            'name' => 'required',
            'instructions' => 'required',
        ]);
        $exercise->name = $request['name'];
        $exercise->instructions = $request['instructions'];
        return $exercise->save();
    }

    public function destroy(Exercise $exercise): bool
    {
        return $exercise->delete();
    }
}
