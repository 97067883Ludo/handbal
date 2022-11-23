<template>
    <div>
        <tafeldienstHeader></tafeldienstHeader>
        <search
            v-model="searchString"
            v-on:input="debounceInput"
        ></search>
        {{searchString}}
        <index></index>
    </div>
</template>

<script>
import tafeldienstHeader from './tafeldienst-header.vue'
import search from './search.vue'
import index from './index.vue'

export default {
    data() {
        return {
            searchResults: [],
            searchString: '',
        }
    },
    components: {
        tafeldienstHeader,
        search,
        index,
    },
    methods: {
        debounceInput() {
            console.log('hsdkfjksjdfkljslkfdj')
        }
    },
}
</script>
