<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        return response()->json(School::get());
    }

    public function store(Request $request)
    {
        School::create($request->input());
        return response()->json([], 201);
    }

    public function update(Request $request, int $id)
    {
        School::findOrFail($id)->update($request->input());
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        $school = School::findOrFail($id);
        $school->courses()->delete();
        $school->delete();
        return response()->json([], 204);
    }
}
