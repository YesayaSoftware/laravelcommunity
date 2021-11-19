<template>
    <Link :href="'/'">
        <img class="w-16 h-16" src="/img/logo.png" alt="Laravel Community">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
