<!-- resources/views/students/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Student</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('students.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Class:</label>
                <input type="text" name="class" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Roll No:</label>
                <input type="text" name="rollno" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <input type="radio" name="gender" value="male" required> Male
                <input type="radio" name="gender" value="female" required> Female
            </div>
            <div class="form-group">
                <label>City:</label>
                <select name="city_id" class="form-control" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Country:</label>
                <select name="country_id" class="form-control" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="checkbox" name="confirm_checkbox" required> I confirm
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
