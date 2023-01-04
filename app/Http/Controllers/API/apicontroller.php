<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Validator;

class apicontroller extends Controller
{
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|min:3|max:191',
            'email' => 'required|email|max:191',
            'address' => 'required|min:3|max:191'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        } else {
            $student = new students;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->save();

            return response()->json([
                'status' => 200,
                'message' => 'Student created successfully'
            ], 200);
        }
    }

    public function index(Request $request)
    {
        $students = students::all();
        return response()->json([
            'status' => 200,
            'students' => $students,
        ]);
    }

    public function showbyid($id)
    {
        $student = students::find($id);
        return response()->json([
            'status' => 200,
            'students' => $student,
        ]);
    }
    public function updatedata(Request $request, $id)
    {
        $student = students::find($id);
        if ($student) {
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->update();

            return response()->json([
                'status' => 200,
                'message' => 'Student updated successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'id not found'
            ], 422);
        }
    }

    public function delete($id)
    {
        $student = students::find($id);
        if ($student) {

            $student->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Student deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'id not found'
            ], 422);
        }
    }
}
