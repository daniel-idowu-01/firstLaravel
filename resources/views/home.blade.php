<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder='name' id="">
            <input type="email" name="email" placeholder='email' id="">
            <input type="password" name="password" placeholder='password' id="">
            <button type='submit'>Register</button>
        </form>
    </div>
</body>
</html>