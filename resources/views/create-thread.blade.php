<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Thread</title>
</head>
<body>
    {{-- create thread form page --}}
    <h1>Create Thread</h1>
    <form action="/create-thread" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" id="">
        <textarea name="body" placeholder="Body" id=""></textarea>
        <button type='submit'>Create</button>
    </form>
</body>
</html>