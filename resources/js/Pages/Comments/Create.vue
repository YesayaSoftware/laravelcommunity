<template>
    <div class="flex flex-col">
        <form @submit.prevent="store">
            <div class="mt-6 border-t-2 border-gray-200 pt-6">
                <div class="mt-1 rounded-md shadow-sm">
                    <laravel-community-textarea
                        v-model="form.body"
                        rows="1"
                        class="rounded-full"
                        placeholder="Enter your comment here"></laravel-community-textarea>
                </div>
            </div>

            <div class="mt-4">
                <div class="flex justify-end" v-if="form.body.length>3">
                    <span class="inline-flex rounded-md shadow-sm">
                        <laravel-community-secondary-button
                            type="button"
                            class="rounded-full"
                            @click="cancel">
                            Cancel
                        </laravel-community-secondary-button>
                    </span>

                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <laravel-community-primary-button
                            class="rounded-full">
                            Comment
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
        props: ['post'],

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
                    body: '',
                    post_id: this.post.id
                }, {
                    bag: 'createComment',
                    resetOnSuccess: true
                }),
            }
        },

        methods: {
            store() {
                this.form.post(this.route('posts.store.comment', this.post.slug), {
                    preserveScroll: true,

                    onFinish: () => this.form.body = ''
                })
            },

            cancel() {
                this.form.body = ''
            }
        }
    }
</script>
