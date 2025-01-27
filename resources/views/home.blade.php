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
    <nav class='bg-white sm:fixed flex items-center justify-between sm:gap-7 px-5 sm:px-10 py-3 z-50 shadow-md w-full'>
        {{-- logo --}}
        <div class='flex items-center'>
            <a
             href='/'
             class='cursor-pointer'>
                <p class='hidden sm:inline blackops sm:text-2xl translate-x-1 ml-1'>
                    naija<span class='text-bice-blue'>g</span>ist
                </p>
                <p  class="sm:hidden text-2xl font-bold text-blue-500">N</p>
            </a>    
        </div>
     
        {{-- search input --}}
        <div class='flex border rounded-full relative items-center px-3 w-1/2'>
            <svg class="absolute opacity-50 text-2xl w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>  
            <input
            class='rounded-full p-3 pl-8 outline-none w-32 sm:w-full'
            type="search" placeholder='Search NaijaGist'
            />
        </div>
        
        {{-- Log In --}}
        <div class='flex items-center gap-5'>
            @auth 
                {{-- user svg --}}
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            @else
                <a
                  href='/login' class='bg-blue-500 text-white px-5 py-2 rounded-md text-sm sm:text-base hidden sm:block'>
                Log In
                </a>        
            @endauth
                {{-- menu svg --}}
                <svg class='sm:hidden cursor-pointer size-6' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
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