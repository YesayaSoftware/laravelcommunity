<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                        Edit: {{ post.title }}
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <Link
                            :href="`/posts`"
                            class="mt-2 flex items-center text-sm leading-5 text-primary-800 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Go back
                        </Link>

                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 16v5a1 1 0 01-1 1H9l-3-6a2 2 0 01-2-2 2 2 0 01-2-2v-2c0-1.1.9-2 2-2 0-1.1.9-2 2-2h7.59l4-4H20a2 2 0 012 2v14a2 2 0 01-2 2h-2.41l-4-4H13zm0-2h1.41l4 4H20V4h-1.59l-4 4H13v6zm-2 0V8H6v2H4v2h2v2h5zm0 2H8.24l2 4H11v-4z"/>
                            </svg>

                            {{ post.comments.length }}
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3 shadow-sm rounded-md">
                        <laravel-community-primary-link
                            :href="route('posts.index')">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6C4 4.89543 4.89543 4 6 4H8C9.10457 4 10 4.89543 10 6V8C10 9.10457 9.10457 10 8 10H6C4.89543 10 4 9.10457 4 8V6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 6C14 4.89543 14.8954 4 16 4H18C19.1046 4 20 4.89543 20 6V8C20 9.10457 19.1046 10 18 10H16C14.8954 10 14 9.10457 14 8V6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 16C4 14.8954 4.89543 14 6 14H8C9.10457 14 10 14.8954 10 16V18C10 19.1046 9.10457 20 8 20H6C4.89543 20 4 19.1046 4 18V16Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 16C14 14.8954 14.8954 14 16 14H18C19.1046 14 20 14.8954 20 16V18C20 19.1046 19.1046 20 18 20H16C14.8954 20 14 19.1046 14 18V16Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            List
                        </laravel-community-primary-link>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-800">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="update">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                            Laravel Community Mission
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-500">
                                            The mission of Laravel Community Tanzania is to invite all the developers to work together and share experiences. Through writing articles and blog posts we believe you will inspire many who are struggling along the way while you have already experienced similar challenges in the past. As a community, we are proud of you for your readiness to help others.
                                        </p>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <laravel-community-label for="title"
                                                   :class="errors.title ? 'text-red-900' : 'text-gray-700'">
                                                Title
                                            </laravel-community-label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <laravel-community-input v-model="form.title"
                                                       type="text"
                                                       name="title"
                                                       id="title"
                                                       autocomplete="title"
                                                       :class="errors.title? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''"/>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="email-error">
                                                <span v-if="errors.title">{{ errors.title }}.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <laravel-community-label
                                                :class="errors.category_id ? 'text-red-900' : 'text-gray-700'">
                                                Category
                                            </laravel-community-label>

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <select
                                                    id="category_id"
                                                    name="category_id"
                                                    v-model="form.category_id"
                                                    class="py-3 px-4 dark:bg-gray-800 dark:text-gray-100 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md"
                                                    :class="errors.category_id? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''">
                                                    <option v-for="category in categories"
                                                            :key="category.id"
                                                            :value="category.id">
                                                        {{ category.name }}
                                                    </option>
                                                </select>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="category-error">
                                                <span v-if="errors.category_id">{{ errors.category_id }}.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <laravel-community-label for="body">
                                                Body
                                            </laravel-community-label>

                                            <div class="mt-1">
                                                <QuillEditor
                                                    v-model:content="form.body"
                                                    contentType="html"
                                                    placeholder="Here we go"
                                                    theme="snow"
                                                    toolbar="essential"
                                                    class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-100 focus:ring-opacity-50 rounded-md shadow-sm block w-full sm:text-sm border-gray-300"
                                                />
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm" id="description-error">
                                                <span v-if="errors.body" class="text-red-600">{{ errors.body }}.</span>

                                                <span v-else class="text-gray-500">Write a few sentences to describe this Post.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <!-- Post Thumbnail -->
                                            <div class="col-span-6 sm:col-span-4">
                                                <!-- Post Thumbnail File Input -->
                                                <input type="file" class="hidden"
                                                       ref="thumbnail"
                                                       @change="updateThumbnailPreview">

                                                <label for="thumbnail" class="block text-sm font-medium leading-5 text-gray-700 dark:text-gray-300">
                                                    Thumbnail
                                                </label>

                                                <!-- Current Post Thumbnail -->
                                                <div class="mt-2 mb-4" v-show="! thumbnailPreview">
                                                    <img id="thumbnail"
                                                         :src="post.thumbnail_url" alt="Current Post Thumbnail" class="w-full object-cover">
                                                </div>

                                                <!-- New Post Thumbnail Preview -->
                                                <div class="mt-2 mb-4" v-show="thumbnailPreview">
                                                <span class="block w-full h-72"
                                                      :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + thumbnailPreview + '\');'">
                                                </span>
                                                </div>

                                                <button type="button"
                                                        @click.prevent="selectNewThumbnail"
                                                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                                    Select A New Thumbnail
                                                </button>

                                                <button type="button"
                                                        @click.prevent="deleteThumbnail"
                                                        v-if="`/${form.thumbnail}`"
                                                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                                    Remove Thumbnail
                                                </button>

                                                <p class="mt-2 text-sm text-red-500">
                                                    {{ errors.thumbnail }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <laravel-community-secondary-link
                                            :href="route('posts.index')">
                                            Cancel
                                        </laravel-community-secondary-link>

                                        <laravel-community-button
                                            class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Save
                                        </laravel-community-button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import LaravelCommunityLabel from '@/LaravelCommunity/Form/Label';
    import LaravelCommunityInput from '@/LaravelCommunity/Form/Input';
    import LaravelCommunityTextarea from '@/LaravelCommunity/Form/Textarea';
    import LaravelCommunityButton from '@/LaravelCommunity/Form/PrimaryButton';
    import LaravelCommunityPrimaryLink from '@/LaravelCommunity/Form/PrimaryLink';
    import LaravelCommunitySecondaryLink from '@/LaravelCommunity/Form/SecondaryLink';

    export default {
        props: ['category', 'categories', 'post', 'errors'],

        components: {
            Head,
            AppLayout,
            LaravelCommunityLabel,
            LaravelCommunityInput,
            LaravelCommunityTextarea,
            LaravelCommunityButton,
            LaravelCommunityPrimaryLink,
            LaravelCommunitySecondaryLink,
            Link
        },

        data() {
            return {
                loading: false,

                form: this.$inertia.form({
                    '_method': 'PUT',
                    title: this.post.title,
                    body: this.post.body,
                    category_id: this.post.category_id,
                    thumbnail: this.post.thumbnail
                }, {
                    bag: 'store',
                    resetOnSuccess: false,
                }),

                thumbnailPreview: null,
            }
        },

        methods: {
            update() {
                this.loading = true

                if (this.$refs.thumbnail)
                    this.form.thumbnail = this.$refs.thumbnail.files[0]

                this.form.post(route('posts.update', this.post.slug), {
                    preserveScroll: true,

                    onFinish: () => this.loading = false
                })
            },

            selectNewThumbnail() {
                this.$refs.thumbnail.click();
            },

            updateThumbnailPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.thumbnailPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.thumbnail.files[0]);
            },

            deleteThumbnail() {
                this.$inertia.delete(this.route('posts.update', {
                    category: this.category.slug,
                    post: this.post.slug
                }), {
                    preserveScroll: true,
                }).then(() => {
                    this.thumbnailPreview = null
                });
            },
        }
    }
</script>
