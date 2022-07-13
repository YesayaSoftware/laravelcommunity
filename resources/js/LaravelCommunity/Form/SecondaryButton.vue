<template>
    <jet-button :type="type" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        <slot></slot>
    </jet-button>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'

export default defineComponent({
    components: {
        JetButton
    },

    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
})
</script>
