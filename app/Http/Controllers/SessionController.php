<?php

namespace App\Http\Controllers;

use App\Models\ExerciseSession;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class SessionController extends Controller
{
    public function index(): string
    {
        return ExerciseSession::all();
    }

    public function store(Request $request): string
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        return ExerciseSession::create($request->all())->toJson();
    }

    public function show(ExerciseSession $session): Collection
    {
        return ExerciseSession::find($session);
    }

    public function update(Request $request, ExerciseSession $session): bool
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $session->name = $request['name'];
        $session->date = $request['date'];
        return $session->save();
    }

    public function destroy(ExerciseSession $session): bool
    {
        return $session->delete();
    }
}
