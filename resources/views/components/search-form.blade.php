<div
    x-data="{ Name: '' }"
    class="flex justify-center mt-5">
    <div class="w-3/4">
        <form class="w-full" @submit.prevent>
            <div
                class="flex items-center border-b border-teal-500 rounded-lg bg-white w-full">
                <input
                    x-model="Name"
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    type="text" placeholder="John Doe" aria-label="John Doe">
                <button
                    @click="fetchData()"
                    class=" h-full flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded-r-lg"
                    type="button">
                    <x-icons.magnifying-glass></x-icons.magnifying-glass>
                </button>
            </div>
        </form>
    </div>
</div>

