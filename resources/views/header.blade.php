<div class="w-screen">
    <div class="bg-gray-200 w-screen h-16 min-h-14 flex flex-row items-center justify-between px-3 pr-10"
         x-data="{ avatarMenuOpen: false }"
    >
        <h1 class="flex text-3xl text-gray-700"><a href="/dashboard">Handbal Schema Maker</a></h1>
        <div
            class="flex rounded-full bg-green-500 h-9 w-9 text-white justify-center items-center text-xl select-none hover:bg-green-600 hover:cursor-pointer"
            @click="avatarMenuOpen =! avatarMenuOpen"
            @click.outside="avatarMenuOpen = false"
            x-cloak
        >{{ $avatar }}</div>
        <div class="float-right right-7 top-7 fixed mt-2 bg-white p-2 rounded"
             x-show="avatarMenuOpen"
             x-cloak
        >
            <p class="select-none font-bold">Menu:</p>
            <a class="py-1.5" href="/logout">Uitloggen</a>
        </div>
    </div>
</div>
