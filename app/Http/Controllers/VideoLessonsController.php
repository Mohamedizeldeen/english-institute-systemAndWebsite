<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\videoLessons;
use App\Http\Requests\VideoLessonsRequest;

class VideoLessonsController extends Controller
{
    public function index()
    {
        $videoLessons = videoLessons::paginate(10);
        return view('video_lessons.index', compact('videoLessons'));
    }
    public function show($id)
    {
        $videoLesson = videoLessons::find($id);
        if ($videoLesson) {
            return view('video_lessons.show', compact('videoLesson'));
        } else {
            return redirect()->route('video_lessons.index')->with('error', 'Video Lesson not found.');
        }
    }
    public function create()
    {
        return view('video_lessons.create');
    }

    public function store(VideoLessonsRequest $request)
    {
        videoLessons::create($request->validated());
        return redirect()->route('video_lessons.index')->with('success', 'Video Lesson created successfully.');
    }
    public function edit($id)
    {
        $videoLesson = videoLessons::find($id);
        if ($videoLesson) {
            return view('video_lessons.edit', compact('videoLesson'));
        } else {
            return redirect()->route('video_lessons.index')->with('error', 'Video Lesson not found.');
        }
    }
    public function update(VideoLessonsRequest $request, $id)
    {
        $videoLesson = videoLessons::find($id);
        if ($videoLesson) {
            $videoLesson->update($request->validated());
            return redirect()->route('video_lessons.index')->with('success', 'Video Lesson updated successfully.');
        } else {
            return redirect()->route('video_lessons.index')->with('error', 'Video Lesson not found.');
        }
    }
    public function destroy($id)
    {
        $videoLesson = videoLessons::find($id);
        if ($videoLesson) {
            $videoLesson->delete();
            return redirect()->route('video_lessons.index')->with('success', 'Video Lesson deleted successfully.');
        } else {
            return redirect()->route('video_lessons.index')->with('error', 'Video Lesson not found.');
        }
    }
}
