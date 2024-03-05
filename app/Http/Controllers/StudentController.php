<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create()
    {
        return view('add-student');
    }

    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect()->back()->with('status', 'Student added successfully!');
    }
    public function index()
    {
    $students = Student::all(); // Fetch all students from the database
    return view('index', compact('students')); // Pass the students data to the view
    }

}
