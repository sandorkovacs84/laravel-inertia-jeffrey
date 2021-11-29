<template>
    <section class="p-6 bg-gray-200">
        <header class="flex bg-gray-200">
            <h1 class="font-bold text-lg">
                My App 
            </h1>

            <Nav />
        </header>
    </section>

    <AppSection class="p-6">
        <slot />
    </AppSection>
</template>

<script>

import Nav from "./Nav"

export default {
    components: { Nav }
}
</script>
