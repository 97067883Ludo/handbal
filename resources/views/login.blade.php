<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/alpine.js')
    <title>Login handbalSchema</title>
</head>
<body class="flex justify-center items-center h-screen bg-slate-200 flex-col">
<h1 class="text-3xl color-grey font-bold text-slate-500 font-sans mb-10">Handbal schema maker</h1>
<div class="flex min-w-[25rem] min-h-fit bg-white shadow-xl	rounded-lg p-5 sm:w-[50px]">
    <form class="flex flex-col w-full" action="/login" method="post">
        @csrf
        @error('error')
                <div class="text-red-500 font-bold">{{ $message }}</div>
        @enderror
        <div>
            <label for="loginname" class="block text-gray-700 font-bold mb-2">Inlognaam *</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" required>
        </div>
        <div>
            <label for="password" class="block text-gray-700 font-bold mb-2 mt-2">wachtwoord *</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required>
        </div>
        <div x-data=" { clicked: false } " class="flex flex-row justify-between items-center mt-3">
            <button
                @click="clicked = true"
                type="submit"
                class="flex p-2 rounded bg-green-500 text-white justify-center"

            >
                <div
                    x-show="clicked"
                    class="fixed animate-spin flex"
                >
                    <x-icons.arrow-path></x-icons.arrow-path>
                </div>

                <div :class="clicked ? 'opacity-25' : ''">
                    Inloggen
                </div>
            </button>


            <a class="" href="#">wachtwoord vergeten?</a>
        </div>
    </form>
</div>
</body>
</html>
