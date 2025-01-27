<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="container relative top-60">
        <h1 class="text-green-500">User Registration</h1>
        <form action="/register" method="POST">
            @csrf
            <input class="border mx-2" type="text" name="name" placeholder='name' id="">
            <input class="border mx-2" type="email" name="email" placeholder='email' id="">
            <input class="border mx-2" type="password" name="password" placeholder='password' id="">
            <button type='submit'>Register</button>
        </form>
    </div>
</body>
</html>