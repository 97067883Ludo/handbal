<template>
    <div>
    <tafeldienst></tafeldienst>
    </div>
</template>

<script>
import tafeldienst from './tafeldienst/tafeldienst.vue'

export default {
    data() {
        return {
            searchResults: [],
        }
    },
    components: {
        tafeldienst,
    }
}
</script>
