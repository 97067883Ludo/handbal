<template>
    <div
        class="p-5 w-full flex flex-wrap">
        <div
            v-if="index.length > 0"
            v-for="item in index"
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 m-2 min-w-[20rem]">

        </div>
        <div
            v-else
        >
            Er zijn geen resultaten gevonden
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            index: {
                type: Array,
                default() {
                    return []
                }
            }
        }
    }
</script>
