<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Thread</h1>
    <form action="/edit-thread/{{$thread->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$thread->title}}" id="">
        <textarea name="body" id="">{{$thread->body}}</textarea>
        <button type='submit'>Update</button>
</body>
</html>