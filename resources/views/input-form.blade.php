<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Data</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-10">
    <div>
        <h1 class="text-2xl font-bold mb-4">Add User Data</h1>

       
        <form action="addUserData" method="post" class="space-y-4 max-w-md">
            @csrf
            <div>
                <label for="name" class="block mb-1">Name</label>
                <input class="border border-gray-300 rounded p-2 w-full" type="text" name="name" id="name" value="{{old('name')}}" >
                <span>@error('name'){{$message}}@enderror </span>
            </div>
            <div>
                <label for="email" class="block mb-1">Email</label>
                <input class="border border-gray-300 rounded p-2 w-full" type="email" name="email" id="email" value="{{old('email')}}">
                <span>@error('email'){{$message}}@enderror </span>
            </div>
            <div>
                <label for="password" class="block mb-1">Password</label>
                <input class="border border-gray-300 rounded p-2 w-full" type="password" name="password" id="password" value="{{old('password')}}">
                <span>@error('password'){{$message}}@enderror </span>
            </div>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
