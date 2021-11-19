<template>
    <textarea :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input"
           rows="3"
           class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-100 focus:ring-opacity-50 rounded-md shadow-sm block w-full sm:text-sm border-gray-300">
    </textarea>
</template>

<script>
export default {
    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>

