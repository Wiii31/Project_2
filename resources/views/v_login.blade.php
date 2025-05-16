<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>
        @if (session('success'))
    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
@endif

        <form action="/login" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="block text-gray-600 mb-1">Username</label>
                <input type="text" id="username" name="username" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label for="password" class="block text-gray-600 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Login
            </button>
        </form>
        
        <p class="text-sm text-center text-gray-500 mt-4">Don't have an account? <a href="/register" class="text-blue-500 hover:underline">Register</a></p>
    </div>

</body>
</html>
