<template>
    <Head title="Categories" />

    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                        Categories
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 16v5a1 1 0 01-1 1H9l-3-6a2 2 0 01-2-2 2 2 0 01-2-2v-2c0-1.1.9-2 2-2 0-1.1.9-2 2-2h7.59l4-4H20a2 2 0 012 2v14a2 2 0 01-2 2h-2.41l-4-4H13zm0-2h1.41l4 4H20V4h-1.59l-4 4H13v6zm-2 0V8H6v2H4v2h2v2h5zm0 2H8.24l2 4H11v-4z"/>
                            </svg>

                            {{ categories.length }}
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="shadow-sm rounded-md">
                        <Link
                            :href="route('posts.index')"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 6C4 4.89543 4.89543 4 6 4H8C9.10457 4 10 4.89543 10 6V8C10 9.10457 9.10457 10 8 10H6C4.89543 10 4 9.10457 4 8V6Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 6C14 4.89543 14.8954 4 16 4H18C19.1046 4 20 4.89543 20 6V8C20 9.10457 19.1046 10 18 10H16C14.8954 10 14 9.10457 14 8V6Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 16C4 14.8954 4.89543 14 6 14H8C9.10457 14 10 14.8954 10 16V18C10 19.1046 9.10457 20 8 20H6C4.89543 20 4 19.1046 4 18V16Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 16C14 14.8954 14.8954 14 16 14H18C19.1046 14 20 14.8954 20 16V18C20 19.1046 19.1046 20 18 20H16C14.8954 20 14 19.1046 14 18V16Z" stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Posts
                        </Link>
                    </span>


                    <span v-if="$page.props.user && $page.props.user.is_admin" class="ml-3 shadow-sm rounded-md">
                        <laravel-community-primary-link
                            :href="route('categories.create')">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>

                            New
                        </laravel-community-primary-link>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-800">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <h2 class="text-3xl leading-9 dark:text-gray-100 font-extrabold tracking-tight sm:text-4xl">
                            Categories
                        </h2>

                        <p class="text-xl leading-7 text-gray-500">
                            Laravel Community will be share contents based of the following categories created by the community content creators. Once creators are registered and approved will select topics from these categories and create content based on that.
                        </p>
                    </div>

                    <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                        <div  v-for="category in categories" :key="category.id"
                              class="flex flex-col rounded-lg shadow-lg dark:bg-gray-900 overflow-hidden">
                            <Link :href="route('categories.show', category.slug)" class="block mt-2">
                                <div class="flex-shrink-0">
                                    <img class="h-48 w-full object-cover" :src="category.thumbnail_url" :alt="category.name"/>
                                </div>

                                <div class="flex-1 bg-white dark:bg-gray-900 p-6 flex flex-col justify-between">
                                    <div class="flex-1">
                                            <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                                {{ category.name }}
                                            </p>

                                            <p class="mt-3 text-base text-gray-500">
                                                {{ category.description }}
                                            </p>
                                    </div>

                                    <div class="mt-6 flex items-center">
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                                <a href="#" class="hover:underline">
                                                    {{ category.user.name }}
                                                </a>
                                            </p>

                                            <div class="flex space-x-1 text-sm text-gray-500">
                                                <time :datetime="category.created_at">
                                                    {{ category.created_at_date }}
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import LaravelCommunityPrimaryLink from "@/LaravelCommunity/Form/PrimaryLink";


    export default {
        props: ['categories', 'successMessage'],

        components: {
            Head,
            AppLayout,
            LaravelCommunityPrimaryLink,
            Link
        }
    }
</script>
