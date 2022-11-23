<template>
    <div>
        <tafeldienstHeader></tafeldienstHeader>
        <search
            v-model="searchString"
            v-on:input="debouncedHandler"
            v-on:search="getData(searchString)"
        ></search>
        <index
            :index="searchResults"
        ></index>
    </div>
</template>

<script>
import tafeldienstHeader from './tafeldienst-header.vue'
import search from './search.vue'
import index from './index.vue'
import {debounce} from 'lodash'

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

    created() {
        this.debouncedHandler = debounce(event => {
            this.getData(event.target.value)
        }, 700)
    },

    beforeUnmount() {
        this.debouncedHandler.cancel()
    },

    methods: {
        getData(filter) {
            axios.get(`/api/tafeldienst/?filter=${filter}`)
                .then((response) => {
                    this.searchResults = response.data
                })
        }
    }
}
</script>
