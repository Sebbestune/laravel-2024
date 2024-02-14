<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        if ($student->save()){
            return response()->json([
                "message"=>"Student record created!"
            ], 201);
        }
        return response()->json([
            "message"=>"Could not create record!"
        ], 500);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Student::where('id', $id)->exists()){
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message"=>"Student not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Student::where('id', $id)->exists()){
        
            $student = Student::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message"=>"Student not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Student::where('id', $id)->exists()){

            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "message" => "records deleted"
              ], 200);
        } else {
            return response()->json([
                "message"=>"Student not found"
            ], 404);
        }
    }
}
