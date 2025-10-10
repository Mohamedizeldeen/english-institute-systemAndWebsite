<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Http\Requests\LevelRequest;


class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::paginate(10);
        return view('levels.index', compact('levels'));
    }

    public function show($id)
    {
        $level = Level::find($id);
        if ($level) {
            return view('levels.show', compact('level'));
        } else {
            return redirect()->route('levels.index')->with('error', 'Level not found.');
        }
    }
    public function create()
    {
        return view('levels.create');
    }

    public function store(LevelRequest $request)
    {
        Level::create($request->validated());
        return redirect()->route('levels.index')->with('success', 'Level created successfully.');
    }
    public function edit($id)
    {
        $level = Level::find($id);
        if ($level) {
            return view('levels.edit', compact('level'));
        } else {
            return redirect()->route('levels.index')->with('error', 'Level not found.');
        }
    }
    public function update(LevelRequest $request, $id)
    {
        $level = Level::find($id);
        if ($level) {
            $level->update($request->validated());
            return redirect()->route('levels.index')->with('success', 'Level updated successfully.');
        } else {
            return redirect()->route('levels.index')->with('error', 'Level not found.');
        }
    }
    public function destroy($id)
    {
        $level = Level::find($id);
        if ($level) {
            $level->delete();
            return redirect()->route('levels.index')->with('success', 'Level deleted successfully.');
        } else {
            return redirect()->route('levels.index')->with('error', 'Level not found.');
        }
    }
}
