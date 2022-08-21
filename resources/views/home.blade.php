<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<div class="w-screen">
    <div class="bg-gray-200 w-screen h-16 min-h-14 flex flex-row items-center justify-between px-3 pr-10"
         x-data="{ avatarMenuOpen: false }"
    >
        <h1 class="flex text-3xl text-gray-700"><a href="/dashboard">Handbal Schema Maker</a></h1>
        <div
            class="flex rounded-full bg-green-500 h-9 w-9 text-white justify-center items-center text-xl select-none hover:bg-green-600 hover:cursor-pointer"
            @click="avatarMenuOpen =! avatarMenuOpen"
            @click.outside="avatarMenuOpen = false"
        >{{ $avatar }}</div>
        <div class="float-right right-7 top-7 fixed mt-2 bg-white p-2 rounded"
             x-show="avatarMenuOpen"
        >
            <p class="select-none font-bold">Menu:</p>
            <a class="py-1.5" href="/logout">Uitloggen</a>
        </div>
    </div>
</div>
<div class="flex justify-center mt-10">
    <div class="flex flex-wrap break-all max-w-[80%]">

    </div>
</div>
</body>
</html>
