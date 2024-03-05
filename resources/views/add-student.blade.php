<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>
    @if(session('status'))
    <div>{{ session('status') }}</div>
    @endif

    <form action="/add-student" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="class" placeholder="Class" required>
        <input type="number" name="rollno" placeholder="Roll Number" required>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <!-- Dropdown for City -->
        <label for="city">City:</label>
        <select name="city" id="city">
            <option value="City1">City1</option>
            <option value="City2">City2</option>
            <!-- Add other cities as needed -->
        </select>
        <!-- Dropdown for Country -->
        <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="Country1">Country1</option>
            <option value="Country2">Country2</option>
            <!-- Add other countries as needed -->
        </select>

        <button type="submit">Add Student</button>
    </form>
<a href="{{route('students.index')}}">lists of students</a>
</body>

</html>