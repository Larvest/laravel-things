<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Course;

use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index() 
    {
        $courses = Course::paginate(5);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|max:30',
            'description'   => 'nullable|max:100',
            'hours'         => 'required|integer|min:1|max:10',
            'price'         => 'required|numeric|min:100',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Курс успешно создан');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.form', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name'          => 'required|max:30',
            'description'   => 'nullable|max:100',
            'hours'         => 'required|integer|min:1|max:10',
            'price'         => 'required|numeric|min:100',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success','Курс обновлён.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success','Курс удалён.');
    }
}
