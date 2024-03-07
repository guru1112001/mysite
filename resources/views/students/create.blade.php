@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-4">Add Student</h2>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('students.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-semibold">Name:</label>
                <input type="text" id="name" name="name" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="class" class="block font-semibold">Class:</label>
                <input type="text" id="class" name="class" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="rollno" class="block font-semibold">Roll No:</label>
                <input type="text" id="rollno" name="rollno" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <span class="block font-semibold mb-1">Gender:</span>
                <input type="radio" id="male" name="gender" value="male" required class="mr-2"><label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required class="mr-2"><label for="female">Female</label>
            </div>
            <div class="mb-4">
                <label for="city" class="block font-semibold">City:</label>
                <select id="city" name="city_id" class="form-select w-full" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="country" class="block font-semibold">Country:</label>
                <select id="country" name="country_id" class="form-select w-full" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold">Email:</label>
                <input type="email" id="email" name="email" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <input type="checkbox" id="confirm_checkbox" name="confirm_checkbox" required class="mr-2"><label for="confirm_checkbox">I confirm</label>
            </div>
            <button type="submit" class="bg-blue-500 text-blue px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
        </form>
    </div>
@endsection
