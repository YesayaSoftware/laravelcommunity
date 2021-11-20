<template>
    <Head :title="post.title" />

    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                        {{ post.title }}
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <Link
                            :href="route('posts.index')"
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

                            {{ post.favorites_count }} Likes
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span v-if="$page.props.user && $page.props.user.is_admin" class="shadow-sm rounded-md mr-2">
                        <form @submit.prevent="destroy">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition"
                                :disabled="loading">

                                <svg class="-ml-1 mr-2 h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="#fde8e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                Delete
                            </button>
                        </form>
                    </span>

                    <span v-if="$page.props.user && $page.props.user.is_admin" class="hidden sm:block shadow-sm rounded-md">
                        <laravel-community-secondary-link
                            :href="route('posts.edit', {category: post.category.slug, post: post.slug})"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>

                            Edit
                        </laravel-community-secondary-link>
                    </span>

                    <span v-if="$page.props.user" class="sm:ml-3 shadow-sm rounded-md">
                        <form @submit.prevent="favorite">
                            <laravel-community-button :class="classes">
                                <svg v-if="post.is_favorited" class="-ml-1 mr-2 w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                </svg>

                                <svg v-else class="-ml-1 mr-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                </svg>

                                <span v-if="post.is_favorited">Unlike</span>
                                <span v-else>Like</span>
                            </laravel-community-button>
                        </form>
                    </span>

                    <span v-if="$page.props.user && $page.props.user.is_admin" class="ml-3 relative shadow-sm rounded-md sm:hidden">
                        <button @click="toggleMobileNav" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out">
                            More

                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div :class="{hidden: hideMobileNav}" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <laravel-community-secondary-link
                                    :href="route('posts.edit', {category: post.category.slug, post: post.slug})"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    Edit
                                </laravel-community-secondary-link>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-800">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="relative overflow-hidden">
                    <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
                        <div class="relative h-full text-lg max-w-prose mx-auto">
                            <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                <defs>
                                    <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                    </pattern>
                                </defs>

                                <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                            </svg>

                            <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                <defs>
                                    <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                    </pattern>
                                </defs>

                                <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                            </svg>

                            <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                <defs>
                                    <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                    </pattern>
                                </defs>

                                <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative px-4 sm:px-6 lg:px-8">
                        <div class="text-lg text-gray-500 mx-auto mb-6">
                            <p class="text-base text-center leading-6 text-blue-600 font-semibold tracking-wide uppercase">
                                <Link :href="route('categories.show', post.category.slug)"
                                    class="text-primary-800">
                                    {{ post.category.name }}
                                </Link>
                            </p>

                            <h1 class="mt-2 mb-8 text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 dark:text-gray-400 sm:text-4xl sm:leading-10">
                                {{ post.title }}
                            </h1>

                            <figure>
                                <img class="w-full rounded-lg"
                                     :src="post.thumbnail_url" :alt="post.title" width="1310" height="873">
                            </figure>
                        </div>

                        <div class="prose prose-lg text-gray-500 mx-auto">
                            <div v-html="post.body" />
                        </div>

                        <div v-if="$page.props.user" class="prose prose-lg text-gray-500 mx-auto">
                            <create-comment :post='post' />
                        </div>

                        <div class="prose prose-lg text-gray-500 mx-auto">
                            <list-comment :comments='post.comments' />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CreateComment from '@/Pages/Comments/Create'
    import ListComment from '@/Pages/Comments/List'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import LaravelCommunityButton from '@/LaravelCommunity/Form/PrimaryButton'
    import LaravelCommunityPrimaryLink from '@/LaravelCommunity/Form/PrimaryLink'
    import LaravelCommunitySecondaryLink from '@/LaravelCommunity/Form/SecondaryLink'

    export default {
        props: ['post'],

        components: {
            Head,
            AppLayout,
            CreateComment,
            ListComment,
            LaravelCommunityButton,
            LaravelCommunityPrimaryLink,
            LaravelCommunitySecondaryLink,
            Link
        },

        data() {
            return {
                loading: false,
                hideMobileNav: true
            }
        },

        computed: {
            classes() {
                return [
                    this.post.is_favorited ? 'bg-gray-900 hover:bg-gray-800 dark:bg-gray-800 dark:hover:bg-gray-900' : ''
                ];
            }
        },

        methods: {
            favorite() {
                if (this.post.is_favorited)
                    this.$inertia.delete(this.route('posts.destroy.favorites', this.post.slug))
                else
                    this.$inertia.post(this.route('posts.store.favorites', this.post.slug))
            },

            destroy() {
                this.loading = true

                this.$inertia.delete(this.route('posts.destroy', this.post.slug), {
                    onBefore: () => confirm('Are you sure you want to delete this post?'),
                    onFinish: () => this.loading = false,
                    preserveScroll: true
                })
            },

            toggleMobileNav() {
                this.hideMobileNav = !this.hideMobileNav
            }
        }
    }
</script>
