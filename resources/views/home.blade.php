<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
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
            x-cloak
        >{{ $avatar }}</div>
        <div class="float-right right-7 top-7 fixed mt-2 bg-white p-2 rounded"
             x-show="avatarMenuOpen"
             x-cloak
        >
            <p class="select-none font-bold">Menu:</p>
            <a class="py-1.5" href="/logout">Uitloggen</a>
        </div>
    </div>
</div>

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="flex justify-center mt-10">
    <div
        class="w-[80%]"
        x-data="{ uploadModalOpen: false }"
    >
        <button
        class="text-white bg-green-500 p-2 bold rounded-lg"
        @click="uploadModalOpen =! uploadModalOpen"
        >
        Nieuwelijst
        </button>
        <div
            class="fixed z-10 inset-0 overflow-y-auto bg-gray-300 opacity-75"
            x-show="uploadModalOpen"
            x-cloak
        >
            <div
                class="flex justify-center mt-20"
                @click.outside="uploadModalOpen = false"

            >
                <div
                    class="w-[40%] min-h-[30%] bg-white rounded-lg p-3"
                >
                    <h1 class="bold">Nieuwe lijst uploaden...</h1>
                    <form action="/home/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div>
                            <input class="mt-2 p-2 bg-green-500 text-white rounded-lg" type="submit" value="Upload Nieuwe lijst" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
