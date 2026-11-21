<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $lessons = $course->lessons;
        return view('admin.lessons.index', compact('course', 'lessons'));
    }

    public function create(Course $course)
    {
        if ($course->lessons()->count() >= 5) {
            return redirect()->route('courses.lessons.index', $course)
                ->with('error', 'Курс не может содержать более 5 уроков');
        }
    
        return view('admin.lessons.form', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if ($course->lessons()->count() >= 5) {
            return redirect()->route('courses.lessons.index', $course)
                ->with('error', 'Курс не может содержать более 5 уроков');
        }

        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'link' => 'nullable|url|regex:/^https:\/\super-tube\.cc\/video\/[a-zA-Z0-9]+$/',
            'duration' => 'required|integer|min:1|max:4',
        ]);

        $validated['course_id'] = $course->id;

        Lesson::create($validated);

        return redirect()->route('courses.lessons.index', $course)
            ->with('success', 'Урок успешно создан');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        return view('admin.lessons.form', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'link' => 'nullable|url|regex:/^https:\/\super-tube\.cc\/video\/[a-zA-Z0-9]+$/',
            'duration' => 'required|integer|min:1|max:4',
        ]);

        $lesson->update($validated);

        return redirect()->route('courses.lessons.index', $course)
            ->with('success', 'Урок обновлён');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $lesson->delete();

        return redirect()->route('courses.lessons.index', $course)
            ->with('success','Урок удалён.');
    }
}
