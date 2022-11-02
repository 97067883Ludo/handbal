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
    <title>Controle</title>
</head>
<body class="bg-gray-100 h-screen">
    <x-head.header />

    <div class="flex justify-center mt-5">
        <form method="post" action="{{route('createPdf')}}" class="w-[75%] h-full">
            @csrf
            <input type="submit" value="Verder ->" class="bg-green-500 hover:bg-green-600 p-3 mb-2 rounded-lg text-white">
            <textarea id="myeditorinstance" name="matchtable" class="h-[26rem]"> {!! $matchTable !!} </textarea>
        </form>
    </div>

</body>
</html>
