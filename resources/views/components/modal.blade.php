<div
    x-data="{ uploadModalOpen: false }"
>
    <button
        class="text-white bg-green-500 p-2 bold rounded-lg hover:bg-green-600"
        @click="uploadModalOpen =! uploadModalOpen"
    >
        Nieuwelijst
    </button>
    <div
        class="fixed z-10 inset-0 overflow-y-auto overflow-hidden"

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
{{--                        <input class="mt-2 p-2 bg-green-500 text-white rounded-lg" type="submit" value="Upload Nieuwe lijst" name="submit">--}}
                        <button
                            x-data=" { inputClicked: false } "
                            @click="inputClicked = true"
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 p-3 mb-2 rounded-lg text-white flex justify-center mt-2"
                        >
                            <span x-show="inputClicked" class="fixed animate-spin "> <x-icons.arrow-path></x-icons.arrow-path> </span>
                            <span :class="inputClicked ? 'opacity-25' : '' ">Upload Nieuwe lijst</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div
        class="fixed h-screen w-screen inset-0 opacity-75 bg-gray-300"
        x-show="uploadModalOpen"
    >

    </div>
</div>
