<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSetRequest;
use App\Http\Requests\UpdateSetRequest;
use App\Models\Set;

final class SetController extends Controller
{
    public function index()
    {
        return Set::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(StoreSetRequest $request)
    {
        $request->validate([
            'number' => 'required',
        ]);

        $set = new Set();
        $set->number = $request->input('number');
        $set->save();

        return redirect()->route('sets.index');
    }

    public function show(Set $set)
    {
        return view('sets.show', compact('set'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Set $set)
    {
        //
    }

    public function update(UpdateSetRequest $request, Set $set)
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
