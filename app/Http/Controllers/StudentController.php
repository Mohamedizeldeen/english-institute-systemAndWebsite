<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }
    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return view('students.show', compact('student'));
        } else {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(StudentRequest $request)
    {
        Student::create($request->validated());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }
    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            return view('students.edit', compact('student'));
        } else {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
    }
    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->update($request->validated());
            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        } else {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
    }
}
