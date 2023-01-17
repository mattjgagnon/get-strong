<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class SessionController extends Controller
{
    public function index(): string
    {
        return Session::all();
    }

    public function store(Request $request): string
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        return Session::create($request->all())->toJson();
    }

    public function show(Session $session): Collection
    {
        return Session::find($session);
    }

    public function update(Request $request, Session $session): bool
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);
        $session->name = $request['name'];
        $session->date = $request['date'];
        return $session->save();
    }

    public function destroy(Session $session): bool
    {
        return $session->delete();
    }
}
