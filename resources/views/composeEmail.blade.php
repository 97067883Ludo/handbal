<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <x-head.tinymce-config/>
    <title>Document</title>
</head>
<body class="bg-gray-100">
<x-head.header/>
<h2 class="px-7 mt-5 text-2xl">
    Verstuur via email
</h2>
<form action="POST">
    @csrf
    <div class="flex flex-row h-full">
        <div class="w-[50%]">
            <div class="h-full w-full px-7 py-8">
                <div class="bg-white p-3 rounded-lg">
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-email"
                        >
                            Aan
                        </label>
                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-blue-400 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="grid-email"
                               type="Email"
                               placeholder="Email"
                        >

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-subject"
                        >
                            Onderwerp
                        </label>
                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-blue-400 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="grid-subject"
                               type="subject"
                               placeholder="onderwerp"
                        >

                        <textarea id="compose-email"
                                  name="emailText"
                        ></textarea>
                        <input
                            class="text-white p-3 bg-green-500 rounded-lg mt-5"
                            type="button"
                            value="verstuur"
                        >

                    </div>
                </div>
            </div>
        </div>
        <div class="w-[50%]">
            <div class="h-full w-full px-7 py-8">
                <div class="bg-white p-3 rounded-lg">
                    pdf preview
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
