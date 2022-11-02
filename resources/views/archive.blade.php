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
                            @if($archiveItems->count())
                            @foreach($archiveItems as $index => $archiveItem)
                                <tr class="odd:bg-gray-100 even:bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4">
                                        {{$archiveItem->created_at}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light float-right px-6 py-4">

                                        <div class="flex">
                                            <div x-data="{ clicked: false }" class="inline-flex">
                                                <a @click="clicked = true" href="{{route('mailPdf')}}?file={{$archiveItem->id}}" class="mr-4" :class="clicked ? 'mr-4 opacity-25' : 'mr-4' " >
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z"/>
                                                    </svg>

                                                </a>
                                                <div
                                                    class="w-6 h-6 fixed animate-spin"
                                                    x-show="clicked"
                                                >
                                                    <x-icons.arrow-path
                                                    ></x-icons.arrow-path>
                                                </div>
                                            </div>

                                            <div x-data="{ clicked: false }" class="inline-flex">
                                                <a @click="clicked = true" href="{{route('deleteMediaItem')}}?file={{$archiveItem->id}}" class="mr-4" :class="clicked ? 'mr-4 opacity-25' : 'mr-4' ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                    </svg>
                                                </a>
                                                <div
                                                    class="w-6 h-6 fixed animate-spin"
                                                    x-show="clicked"
                                                >
                                                    <x-icons.arrow-path
                                                    ></x-icons.arrow-path>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <div class="w-full">
                                    <tr>
                                        <td colspan="3" class="text-center text-2xl">
                                            Geen items gevonden...
                                            <br>
                                            <a href="/home" class="underline text-blue-500">Maak je eerste lijst aan</a>
                                        </td>
                                    </tr>
                                </div>
                            @endif
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
