<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- page for dynamic thread --}}
    <h1>Thread</h1>
    <h2>{{$thread->title}}</h2>
    <p>{{$thread->body}}</p>
    <a href="/edit-thread/{{$thread->id}}">Edit</a>
    <form action="/delete-thread/{{$thread->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type='submit'>Delete</button>
    </form>
    <a href="/threads">Back</a>
</body>
</html>