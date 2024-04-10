<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

final class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        return Tag::create($request->all())->toJson();
    }

    public function show(Tag $tag)
    {
        return Tag::find($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
        $tag->name = $request['name'];
        $tag->type = $request['type'];
        return $tag->save();
    }

    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }
}
