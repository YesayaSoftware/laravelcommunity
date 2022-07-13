<template>
    <jet-label>
        <slot></slot>
    </jet-label>
</template>

<script>
import { defineComponent } from 'vue'
import JetLabel from '@/Jetstream/Label'

export default defineComponent({
    components: {
        JetLabel
    }
})
</script>
