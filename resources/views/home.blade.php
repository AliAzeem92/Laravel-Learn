<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        @include('common.info', ['info' => 'Ali Azeem'])
        <h1 class="text-[red]">Home Page</h1>
        <h1 class="text-[blue] font-bold ">{{ $name }}</h1>

        <x-massage-banner msg="Login Successfull"   style="text-[lightgreen] text-[50px] font-bold px-10 bg-[green] w-fit m-3 " />
        <x-massage-banner msg="Welcome"  style="text-[lightblue] text-[50px] font-bold px-10 bg-[blue] w-fit m-3 " />

        <a href="{{ route('form') }}">Input Form </a>
    </div>
</body>
</html>
