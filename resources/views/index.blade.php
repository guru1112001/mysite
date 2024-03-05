<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
</head>
<body>
    <h1>Students</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Roll No</th>
                <th>Gender</th>
                <th>City</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->rollno }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->city }}</td>
                    <td>{{ $student->country }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('add.student')}}">Add student</a>
</body>
</html>
