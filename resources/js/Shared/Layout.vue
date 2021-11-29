<template>
    <Nav></Nav>

    <slot></slot>
</template>

<script>

import Nav from "./Nav"

export default {
    components: { Nav }
}
</script>
