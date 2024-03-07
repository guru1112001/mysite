@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-4">Students List</h2>
        <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Add Student</a>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200">Name</th>
                    <th class="px-4 py-2 bg-gray-200">Class</th>
                    <th class="px-4 py-2 bg-gray-200">Roll No</th>
                    <th class="px-4 py-2 bg-gray-200">Gender</th>
                    <th class="px-4 py-2 bg-gray-200">City</th>
                    <th class="px-4 py-2 bg-gray-200">Country</th>
                    <th class="px-4 py-2 bg-gray-200">Email</th>
                    <th class="px-4 py-2 bg-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->class }}</td>
                    <td class="border px-4 py-2">{{ $student->rollno }}</td>
                    <td class="border px-4 py-2">{{ $student->gender }}</td>
                    <td class="border px-4 py-2">{{ $student->city->id }}</td>
                    <td class="border px-4 py-2">{{ $student->country->id }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('students.edit', $student->id) }}"  class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-1 my-3 rounded-md">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-red-700 text-white px-2 py-1 rounded-md" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
