<template>
    <div class="flex flex-col mb-4">
        <form @submit.prevent="update">
            <div class="mt-6 border-t-2 border-gray-200 pt-6">
                <div class="mt-1 rounded-md shadow-sm">
                    <textarea
                        v-model="form.body"
                        rows="1"
                        class="form-input dark:bg-gray-800 dark:text-gray-100 rounded-full block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
                        placeholder="Enter your comment here"></textarea>
                </div>
            </div>

            <div class="mt-4">
                <div class="flex justify-end" v-if="form.body.length>3">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button
                            type="button"
                            @click="cancel"
                            class="py-2 px-4 border border-gray-300 rounded-full text-sm leading-5 font-medium text-gray-700 dark:text-gray-100 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            Cancel
                        </button>
                    </span>

                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <button @click="update"
                            type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-full text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">

                            Update
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['comment'],

        data() {
            return {
                form: this.$inertia.form({
                    id: this.comment.id,
                    body: this.comment.body,
                    post_id: this.comment.post_id
                }, {
                    bag: 'editComment',
                    resetOnSuccess: true
                }),

                editing: false
            }
        },

        methods: {
            update() {
                this.form.put(this.route('posts.update.comment', this.form.id), {
                    preserveScroll: true
                })

                this.$emit('update-comment')
            },

            cancel() {
                this.form.body = ''
                this.$emit('update-comment')
            }
        }
    }
</script>
