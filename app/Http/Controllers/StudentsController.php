<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    // Display the welcome view with students data
    public function myWelcomeView()
    {
        $students = Student::all();
        return view('welcome', compact('students'));
    }

    // Create a new student
    public function createNewStd(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|max:6',
            'address' => 'required|max:255'
        ]);

        Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Student added successfully!');
    }

    // Update an existing student
    public function updateStd(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|max:6',
            'address' => 'required|max:255'
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function deleteStd($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return back()->with('success', 'Student deleted successfully!');
    }
}
