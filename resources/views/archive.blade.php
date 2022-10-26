<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Handbal - Archief</title>
</head>
<body class="bg-gray-100">
<x-head.header></x-head.header>
<x-notifications></x-notifications>
<div class="flex flex-col mt-10">
    <div class="w-[80%] m-auto justify-center">
        <div class="flex flex-row">
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class=" min-w-full sm:px-6 lg:px-8">
                    @csrf
                    <div class="p-2 bg-white rounded-2xl my-3">
                        <table class="min-w-full">
                            <thead class="bg-white border-b">
                            <tr>
                                @foreach($headers as $header)
                                    <th scope="col"
                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        {{$header}}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($archiveItems as $index => $archiveItem)
                                <tr class="odd:bg-gray-100 even:bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4">
                                        {{$archiveItem->created_at}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light float-right px-6 py-4">
                                        <a href="{{route('mailPdf')}}?file={{$archiveItem->id}}">Mail</a>
                                        <a href="{{route('deleteMediaItem')}}?file={{$archiveItem->id}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
