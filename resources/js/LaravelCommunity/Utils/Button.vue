<template>
    <jet-button :type="type" class="ml-4 bg-primary-800 hover:bg-primary-900 active:bg-primary-300 active:text-primary-800">
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
