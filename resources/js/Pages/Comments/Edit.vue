<template>
    <div class="flex flex-col mb-4">
        <form @submit.prevent="update">
            <div class="mt-6 border-t-2 border-gray-200 pt-6">
                <div class="mt-1 rounded-md shadow-sm">
                    <laravel-community-textarea
                        v-model="form.body"
                        class="rounded-full"
                        rows="1"
                        placeholder="Enter your comment here"></laravel-community-textarea>
                </div>
            </div>

            <div class="mt-4">
                <div class="flex justify-end" v-if="form.body.length>3">
                    <span class="inline-flex rounded-md shadow-sm">
                        <laravel-community-secondary-button
                            type="button"
                            @click="cancel"
                            class="rounded-full">
                            Cancel
                        </laravel-community-secondary-button>
                    </span>

                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <laravel-community-primary-button
                            @click="update"
                            class="rounded-full">

                            Update
                        </laravel-community-primary-button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import LaravelCommunityLabel from '@/LaravelCommunity/Form/Label';
import LaravelCommunityInput from '@/LaravelCommunity/Form/Input';
import LaravelCommunityTextarea from '@/LaravelCommunity/Form/Textarea';
import LaravelCommunityPrimaryButton from '@/LaravelCommunity/Form/PrimaryButton';
import LaravelCommunitySecondaryButton from '@/LaravelCommunity/Form/SecondaryButton';

    export default {
        props: ['comment'],

        components: {
            LaravelCommunityLabel,
            LaravelCommunityInput,
            LaravelCommunityTextarea,
            LaravelCommunityPrimaryButton,
            LaravelCommunitySecondaryButton
        },

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
