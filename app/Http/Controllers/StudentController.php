<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::with(['course'])->get());
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->course()->associate(Course::findOrFail($request->input('course.id')));
        $student->fill($request->input());
        $student->save();
        return response()->json([], 201);
    }

    public function update(Request $request, int $id)
    {
        $student = Student::findOrFail($id);
        $student->course()->associate(Course::findOrFail($request->input('course.id')));
        $student->fill($request->input());
        $student->save();
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json([], 204);
    }
}
