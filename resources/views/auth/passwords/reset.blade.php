<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center items-center h-screen w-full">
        <form method="POST" action="{{ route('password.update') }}" class="w-1/4 h-64 flex flex-col gap-3 justify-between">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <p class="text-2xl text-blue-500 font-bold">Reset Password</p>

            <div>
                <label for="email">Email Address</label>
                <input type="email" class="w-full rounded-md" name="email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" class="w-full rounded-md" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="w-full rounded-md" name="password_confirmation" required>
            </div>
            
            <button type="submit" class="block bg-blue-500 text-white w-full px-4 py-2 rounded-md mt-2">Reset Password</button>
          </form>
    </div>
</body>
</html>