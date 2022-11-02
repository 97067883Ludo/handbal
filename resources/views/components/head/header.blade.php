<div class="w-full">
    <div class="bg-gray-200 w-full h-16 min-h-14 flex flex-row items-center justify-between px-3 pr-10"
         x-data="{ avatarMenuOpen: false }"
    >
        <h1 class="flex text-3xl text-gray-700"><a href="/">Handbal Schema Maker</a></h1>
        <div
            class="flex rounded-full bg-green-500 h-9 w-9 text-white justify-center items-center text-xl select-none hover:bg-green-600 hover:cursor-pointer"
            @click="avatarMenuOpen =! avatarMenuOpen"
            @click.outside="avatarMenuOpen = false"
            x-cloak
        >{{ucfirst(Auth::user()->name[0])}}</div>
        <div class="float-right right-7 top-7 fixed mt-2 bg-white p-2 rounded z-20"
             x-show="avatarMenuOpen"
             x-cloak
        >
            <p class="select-none font-bold">Menu:</p>
            <div class="flex flex-col">
                <a class="py-1.5 pl-0.5 rounded {{ request()->is('home') ? 'bg-slate-100 cursor-not-allowed pointer-events-none' : 'hover:bg-slate-300 ' }}" href="/home/">Home</a>
                <a class="py-1.5 my-0.5 pl-0.5 rounded {{ request()->is('home/archive') ? 'bg-slate-100 cursor-not-allowed pointer-events-none' : 'hover:bg-slate-300 ' }}" href="/home/archive">Archief</a>
                <a class="py-1.5 pl-0.5 rounded {{ request()->is('uitloggen') ? 'bg-slate-100 cursor-not-allowed pointer-events-none' : 'hover:bg-slate-300 ' }}" href="/logout">Uitloggen</a>
            </div>
        </div>
    </div>
</div>
