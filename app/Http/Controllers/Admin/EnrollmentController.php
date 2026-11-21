<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Migrations\Migration;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request; 
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();
        $query = Enrollment::with(['user', 'course']);

        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        $enrollments = $query->paginate(10);

        return view('admin.enrollments.index', compact('enrollments', 'courses'));
    }
}
