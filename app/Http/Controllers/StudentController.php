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
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'class' => 'required|numeric|max:10',
            'rollno' => 'required|numeric|digits_between:1,10',
            'gender' => 'required|in:male,female',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'email' => 'required|email|max:100',
            'confirm_checkbox' => 'accepted',
        ], [
            'name.regex' => 'The name field should only contain letters and spaces.',
            'class.numeric' => 'The class field must be a number.',
            'rollno.numeric' => 'The roll number field must be a number.',
            
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
    public function edit($id)
    {
    $student = Student::findOrFail($id);
    // Assuming you have 'cities' and 'countries' for dropdowns in your form
    $cities = City::all(); // Make sure to add `use App\Models\City;` at the top
    $countries = Country::all(); // Make sure to add `use App\Models\Country;` at the top
    return view('students.edit', compact('student', 'cities', 'countries'));
    }

    public function destroy($id)
    {
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        'class' => 'required|numeric|max:10',
        'rollno' => 'required|numeric|digits_between:1,10',
        'gender' => 'required|in:male,female',
        'city_id' => 'required|exists:cities,id',
        'country_id' => 'required|exists:countries,id',
        'email' => 'required|email|max:100',
    ], [
        'name.regex' => 'The name field should only contain letters and spaces.',
        'class.numeric' => 'The class field must be a number.',
        'rollno.numeric' => 'The roll number field must be a number.',
        
    ]);
    

    $student = Student::findOrFail($id);
    $student->update($request->all());

    return redirect()->route('students.index')->with('success', 'Student updated successfully');
}


}
