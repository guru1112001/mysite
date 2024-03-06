<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <!-- Include any CSS or JavaScript files here -->
</head>
<body>
    <header>
        <!-- Header content goes here -->
        <h1>My App</h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content goes here -->
        <p>&copy; {{ date('Y') }} My App. All rights reserved.</p>
    </footer>
</body>
</html>
