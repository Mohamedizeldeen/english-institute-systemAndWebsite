<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('teachers.index', compact('teachers'));
    }
    public function show($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            return view('teachers.show', compact('teacher'));
        } else {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
        }
    }
    public function create()
    {
        return view('teachers.create');
    }
    public function store(TeacherRequest $request)
    {
        Teacher::create($request->validated());
        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            return view('teachers.edit', compact('teacher'));
        } else {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
        }
    }
    public function update(TeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->update($request->validated());
            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
        } else {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
        }
    }
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->delete();
            return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
        } else {
            return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
        }
    }
}
