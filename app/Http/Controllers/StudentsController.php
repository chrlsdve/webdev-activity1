<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function myWelcomeView()
    {
        $students = Student::all();
        $users = User::all();
        return view('welcome', compact('students'));
    }

    public function createNewStd(Request $request)
    {
   

        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|max:6',
            'address' => 'required|max:255'
        ]);

        $addNew = new Student();
        $addNew->name = $request->name;
        $addNew->age = $request->age;
        $addNew->gender = $request->gender;
        $addNew->address = $request->address;
        $addNew->save();

        return back()->with('success', 'Student added successfully!');
    }
}