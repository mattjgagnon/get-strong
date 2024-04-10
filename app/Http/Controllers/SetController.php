<?php

namespace App\Http\Controllers;

use App\Models\Set;
use Illuminate\Http\Request;

final class SetController extends Controller
{
    public function index(): string
    {
        return Set::all();
    }

    public function store(Request $request): string
    {
        $request->validate([
            'number' => 'required',
        ]);

        return Set::create($request->all())->toJson();
    }

    public function show(Set $set)
    {
        return Set::find($set);
    }

    public function update(Request $request, Set $set)
    {
        $request->validate([
            'number' => 'required',
        ]);
        $set->number = $request['number'];
        return $set->save();
    }

    public function destroy(Set $set)
    {
        return $set->delete();
    }
}
