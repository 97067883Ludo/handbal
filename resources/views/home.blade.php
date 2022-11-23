<!doctype html>
<html lang="en">
<head>

    <script>
        function handleClick(e) {
            alert(e)
        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/alpine.js')
    <title>SchemaMaker</title>
</head>
<body class="bg-gray-100">
<x-head.header/>
<x-notifications></x-notifications>
<div class="flex flex-col mt-10 inline-flex w-full">
    <div class="w-[80%] m-auto justify-center">
        <div x-data="{inputClicked : false}" class="flex flex-row">
            <x-modal></x-modal>
            <button
                form="FORM"
                @click="inputClicked = true"
                class="p-2 bg-green-500 text-white rounded-lg hover:bg-green-600 hover:cursor-pointer mx-2 flex justify-center"

            >
                <span x-show="inputClicked" class="fixed animate-spin "> <x-icons.arrow-path></x-icons.arrow-path> </span>
                <span :class="inputClicked ? 'opacity-25' : '' ">Verder</span>
            </button>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class=" min-w-full sm:px-6 lg:px-8">
                    <form action="/home/check" id="FORM" method="POST">
                        @csrf
                        <div class="p-2 bg-white rounded-2xl my-3">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        #
                                    </th>
                                    @foreach($headers as $header)
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            {{$header}}
                                        </th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wedstrijden as $wedstrijd)
                                    <tr class="odd:bg-gray-100 even:bg-white border-b" x-data="{checked : false}"
                                        @click="checked = !checked">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <input type="checkbox" id="{{$wedstrijd->id}}"
                                                   value="{{json_encode($wedstrijd)}}" x name="matches[]"
                                                   x-model="checked">
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                                            {{$wedstrijd->datum}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                                            {{$wedstrijd->tijd}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                                            {{$wedstrijd->thuisteam}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                                            {{$wedstrijd->uitteam}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                                            {{$wedstrijd->scheidsrechter_1}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                                            {{$wedstrijd->scheidsrechter_2}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                            {{$wedstrijd->tafeldienst}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
