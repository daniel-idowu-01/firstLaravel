<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Thread</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-2xl/9 font-bold tracking-tight text-gray-900">Create Thread</h2>
        </div>
      
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/create-thread" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div>
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <input type="text" name="title" id="title" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6 border">
                    </div>
                </div>
            
                <div>
                    <label for="body" class="block text-sm/6 font-medium text-gray-900">Content</label>
                    <div class="mt-2">
                        <textarea name="body" id="body" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6 border"></textarea>
                    </div>
                </div>
            
                <div>
                    <label for="category_id" class="block text-sm/6 font-medium text-gray-900">Category</label>
                    <div class="mt-2">
                        <select name="category_id" id="category_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6 border">
                            <option value="1">AI/ML</option>
                            <option value="2">Web Development</option>
                            <option value="3">Mobile Development</option>
                            <option value="4">Game Development</option>
                            <option value="5">DevOps</option>
                            <option value="6">Cybersecurity</option>
                            <option value="7">Data Science</option>
                            <option value="8">Cloud Computing</option>
                            <option value="9">IoT</option>
                            <option value="10">Blockchain</option>
                            <option value="11">AR/VR</option>
                            <option value="12">Quantum Computing</option>
                            <option value="13">Programming</option>
                            <option value="14">Miscellaneous</option>
                        </select>
                    </div>
                </div>
            
                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm/6 font-medium text-gray-900">Choose an image:</label>
                    <input type="file" name="image" id="image" accept="image/*" required>
                </div>
            
                <div>
                    <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create Thread</button>
                </div>
            </form>
            
        </div>
    </section>
</body>
</html>