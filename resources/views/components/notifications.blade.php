@if ($message = Session::get('error'))
    <div
        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md fixed right-0 mt-3 min-w-[20rem] max-w-[20rem] cursor-pointer"
        role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Our privacy policy has changed</p>
                <p class="text-sm">Make sure you know how these changes affect you.</p>
            </div>
        </div>
    </div>
@endif
@if($email = Session::get('email'))
    @if($email === 'true')
        <div x-data="{ openDialog : true }">
            <div
                class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md fixed right-0 mt-3 min-w-[20rem] max-w-[20rem] cursor-pointer"
                x-show="openDialog"
                @click="openDialog = !openDialog"
                x-init="setTimeout(() => openDialog = false, 3000)"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Email:</p>
                        <p class="text-sm">Email is succesvol verzonden</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div x-data="{ openDialog : true }">
            <div
                class="bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md fixed right-0 mt-3 min-w-[20rem] max-w-[20rem] cursor-pointer"
                x-show="openDialog"
                @click="openDialog = !openDialog"
                x-init="setTimeout(() => openDialog = false, 3000)"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Email:</p>
                        <p class="text-sm break-words">Er is iets mis gegaan tijdens het versturen van de email</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@if($email = Session::get('delete'))
    @if($email === 'true')
        <div x-data="{ openDialog : true }">
            <div
                class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md fixed right-0 mt-3 min-w-[20rem] max-w-[20rem] cursor-pointer"
                x-show="openDialog"
                @click="openDialog = !openDialog"
                role="alert"
                x-init="setTimeout(() => openDialog = false, 3000)">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Archief:</p>
                        <p class="text-sm">het verwijderen van een bestand is gelukt</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div x-data="{ openDialog : true }">
            <div
                class="bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md fixed right-0 mt-3 min-w-[20rem] max-w-[20rem] cursor-pointer"
                x-show="openDialog"
                @click="openDialog = !openDialog"
                x-init="setTimeout(() => openDialog = false, 3000)"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Archief:</p>
                        <p class="text-sm break-words">Het is mislutk om een bestand te verwijderen</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
