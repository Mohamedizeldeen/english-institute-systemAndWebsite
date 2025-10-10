<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate (10);
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        if ($course) {
            return view('courses.show', compact('course'));
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(CourseRequest $request)
    {
        Course::create($request->validated());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        if ($course) {
            return view('courses.edit', compact('course'));
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }

    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->update($request->validated());
            return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }
}
