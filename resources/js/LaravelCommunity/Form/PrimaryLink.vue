<template>
    <Link :href="href"
                  class="inline-flex items-center px-4 py-2 bg-primary-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-900 active:bg-primary-300 active:text-primary-800 focus:outline-none focus:border-primary-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        <slot></slot>
    </Link>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Link,
    },

    props: {
        href: {
            href: String
        },
    }
})
</script>
