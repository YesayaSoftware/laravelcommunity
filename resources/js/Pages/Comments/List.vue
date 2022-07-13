<template>
    <div class="p-4">
        <div v-for="comment in comments" :key="comment.id">
            <show-comment :comment="comment" />
        </div>
    </div>
</template>

<script>
    import ShowComment from '@/Pages/Comments/Show'

    export default {
        props: ['comments'],

        components: {
            ShowComment
        }
    }
</script>
