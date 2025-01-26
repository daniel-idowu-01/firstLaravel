<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- Navigation bar --}}
    <nav class='bg-white md:fixed flex items-center justify-between md:gap-7 px-5 py-3 z-50 shadow-md w-full'>
        {{-- logo --}}
        <div class='flex items-center'>
            <a
             href='/'
             class='cursor-pointer'>
                <img src="" alt="" class='w-7 inline' />
                <p class='hidden md:inline blackops md:text-2xl translate-x-1 ml-1'>
                    naija<span class='text-bice-blue'>g</span>ist
                </p>
            </a>    
        </div>
     
        {{-- search input --}}
        <div class='flex border rounded-full relative items-center px-3 w-1/2'>
            <svg class="absolute opacity-50 text-2xl w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>  
            <input
            class='rounded-full p-3 pl-8 outline-none w-32 md:w-full'
            type="search" placeholder='Search NaijaGist'
            />
        </div>
        
        {{-- Log In --}}
        <div class='flex items-center gap-5'>
            <a
             href='/login' class='bg-blue-500 text-white px-5 py-2 text- rounded-md text-sm md:text-base'>
              Log In
            </a>
            <svg class='md:hidden cursor-pointer size-6' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>              
        </div>
    </nav>


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
                    <h2>{{ $post->title }} by {{$post->user->name}}</h2>
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
        <div class="container relative top-60">
            <h1>Log In</h1>
            <form action="/login" method="POST">
                @csrf
                <input class="border mx-2" type="email" name="loginemail" placeholder='email' id="">
                <input class="border mx-2" type="password" name="loginpassword" placeholder='password' id="">
                <button type='submit'>Log In</button>
            </form>
        </div>
    @endauth
</body>
</html>