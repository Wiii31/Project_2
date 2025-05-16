<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-100 to-purple-100">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Register</h2>
        @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
        {{ session('success') }}
        </div>
        @endif

        <form action="/register" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nama" class="block text-gray-600 mb-1">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none">
            </div>

            <div>
                <label for="username" class="block text-gray-600 mb-1">Username</label>
                <input type="text" id="username" name="username" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none">
            </div>

            <div>
                <label for="password" class="block text-gray-600 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600 transition duration-200">
                Register
            </button>
        </form>

        <p class="text-sm text-center text-gray-500 mt-4">Sudah punya akun? <a href="/login" class="text-purple-500 hover:underline">Login di sini</a></p>
    </div>

</body>
</html>
