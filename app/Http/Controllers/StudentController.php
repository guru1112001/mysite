<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\Country;

class StudentController extends Controller
{
    public function create()
    {
        $cities = City::all();
        $countries = Country::all();
        return view('students.create', compact('cities', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'rollno' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'email' => 'required|string|email|max:255|unique:students',
            'confirm_checkbox' => 'accepted',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->class = $request->class;
        $student->rollno = $request->rollno;
        $student->gender = $request->gender;
        $student->city_id = $request->city_id;
        $student->country_id = $request->country_id;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('students.create')->with('success', 'Student added successfully!');
    }
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
}
