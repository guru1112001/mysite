<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <!-- Include any CSS or JavaScript files here -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    

    <nav class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center px-8">
            <h1 class="text-white text-2xl font-bold">My App</h1>
            <ul class="flex">
                <li class="mr-6"><a href="/" class="text-white hover:text-gray-400">Home</a></li>
                <li class="mr-6"><a class="text-white hover:text-gray-400"href="{{route('students.index')}}">Student List</a></li>
                <li><a href="/about" class="text-white hover:text-gray-400">About</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </nav>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mx-auto w-1/2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <main class="container mx-auto mt-4 px-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <!-- Footer content goes here -->
        <p>&copy; {{ date('Y') }} My App. All rights reserved.</p>
    </footer>

</body>
</html>
