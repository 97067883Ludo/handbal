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
