<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::paginate(10);
        return view('enrollments.index', compact('enrollments'));
    }
    public function show($id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            return view('enrollments.show', compact('enrollment'));
        } else {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found.');
        }
    }
    public function create()
    {
        return view('enrollments.create');
    }
    public function store(EnrollmentRequest $request)
    {
        Enrollment::create($request->validated());
        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }
    public function edit($id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            return view('enrollments.edit', compact('enrollment'));
        } else {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found.');
        }
    }
    public function update(EnrollmentRequest $request, $id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->update($request->validated());
            return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
        } else {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found.');
        }
    }
    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->delete();
            return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
        } else {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found.');
        }
    }
}
