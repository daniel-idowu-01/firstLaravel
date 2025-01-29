<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center items-center h-screen w-full">
        <form method="POST" action="{{ route('password.email') }}" class="w-1/4 h-40 flex flex-col justify-between">
            @csrf
            <p class="text-2xl text-blue-500 font-bold">Forgot Password</p>
            <div>
                <label for="email">Email Address</label>
                <input class="w-full rounded-md" type="email" name="email" required autofocus>
                <button class="block bg-blue-500 text-white w-full px-4 py-2 rounded-md mt-2" type="submit">Send Reset Link</button>
            </div>
        </form>
    </div>
</body>
</html>