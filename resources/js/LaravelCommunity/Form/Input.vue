<template>
    <jet-input :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input"
           class="block w-full min-w-0"/>
</template>

<script>
import { defineComponent } from 'vue'
import JetInput from '@/Jetstream/Input'

export default defineComponent({
    components: {
        JetInput
    },

    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
})
</script>

