<template>
    <div
        class="flex justify-center mt-5">
        <div class="w-3/4">
            <form class="w-full" @submit.prevent>
                <div
                    class="flex items-center border-b border-teal-500 rounded-lg bg-white w-full">
                    <input
                        :value="modelValue"
                        @input="$emit('update:modelValue', $event.target.value)"
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        type="text" placeholder="Voer uw voor en achternaam in" aria-label="Uw Naam">
                    <button
                        @click="$emit('search')"
                        class=" h-full flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded-r-lg"
                        type="button">
                        <magnifying-glass-icon class="h-6 w-6 text-white"></magnifying-glass-icon>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'

    export default {
        props: ['modelValue'],
        emits: ['update:modelValue', 'search'],

        data() {
            return {
            }
        },

        components: {
            MagnifyingGlassIcon
        },
    }
</script>
