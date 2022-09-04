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
@include('header')


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
    <div>

    </div>

</div>

<div>
    @if(is_null($rows))
        <div>

        </div>
    @endif
</div>

</body>
</html>
