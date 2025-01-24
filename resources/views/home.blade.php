<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
        <p>You are logged In</p>
        <form action="/logout" method="POST">
            @csrf
            <button type='submit'>Logout</button>
        </form>

        <div>
            <h1>Create Post</h1>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder='title' id="">
                <textarea name="body" placeholder='Content...' id=""></textarea>
                <button type='submit'>Post</button>
            </form>
        </div>

        <div>
            <h1>All Posts</h1>
            @foreach ($posts as $post)
                <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit'>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
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
        <div class="container">
            <h1>Log In</h1>
            <form action="/login" method="POST">
                @csrf
                <input type="email" name="loginemail" placeholder='email' id="">
                <input type="password" name="loginpassword" placeholder='password' id="">
                <button type='submit'>Log In</button>
            </form>
        </div>
    @endauth
</body>
</html>