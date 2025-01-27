<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" required autofocus>
        <button type="submit">Send Reset Link</button>
      </form>
</body>
</html>