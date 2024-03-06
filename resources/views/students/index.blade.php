@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Students List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Roll No</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->rollno }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->city->id }}</td>
                    <td>{{ $student->country->id }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
