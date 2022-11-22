<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\School;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::with(['school', 'students'])->get());
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->fill($request->input());
        $course->school()->associate(School::findOrFail($request->input('school.id')));
        $course->save();
        return response()->json([], 201);
    }

    public function update(Request $request, int $id)
    {
        $course = Course::findOrFail($id);
        $course->fill($request->input());
        $course->school()->associate(School::findOrFail($request->input('school.id')));
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        $course = Course::findOrFail($id);
        $course->students()->delete();
        $course->delete();
        return response()->json([], 204);
    }
}
