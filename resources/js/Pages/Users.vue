<template>
    <h1 class="text-4xl font-bold">
        Users
    </h1>
</template>

<script>


import { Nav } from '../Shared/Nav'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: { Nav },

    props: { time: String }
}
</script>
