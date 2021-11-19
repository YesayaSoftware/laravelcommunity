<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                        Newsletter
                    </h2>

                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <inertia-link
                            :href="route('newsletters.index')"
                            class="mt-2 flex items-center text-sm leading-5 text-blue-500 sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                 viewBox="0 0 24 24">
                                <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="#4A5568" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Go back
                        </inertia-link>
                    </div>
                </div>

                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span v-if="$page.props.user && $page.props.user.is_admin" class="shadow-sm rounded-md mr-2">
                        <form id="delete-form"
                              method="POST"
                              @submit.prevent="destroy">
                            <yesaya-software-button
                                class="bg-red-700 dark:bg-red-700 dark:hover:bg-red-600 hover:text-red-100 focus:outline-none focus:shadow-outline-red focus:border-red-300 active:text-gray-800">

                                <svg class="-ml-1 mr-2 h-5 w-5 text-red-100" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20"
                                        stroke="#fde8e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                Delete
                            </yesaya-software-button>
                        </form>
                    </span>

                    <span v-if="$page.props.user && $page.props.user.is_admin"
                          class="hidden sm:block shadow-sm rounded-md">
                        <yesaya-software-secondary-link
                            :href="route('newsletters.edit', newsletter.slug)"
                            class="dark:bg-gray-800 dark:hover:bg-gray-900">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>

                            Edit
                        </yesaya-software-secondary-link>
                    </span>

                    <span v-if="$page.props.user" class="sm:ml-3 shadow-sm rounded-md">
                        <form @submit.prevent="publish">
                            <yesaya-software-button>
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>

                                <span v-if="newsletter.status === true">Published</span>
                                <span v-else>Publish</span>
                            </yesaya-software-button>
                        </form>
                    </span>

                    <span v-if="$page.props.user && $page.props.user.is_admin" x-data="{ open: false }"
                          class="ml-3 relative shadow-sm rounded-md sm:hidden">
                        <button @click="toggleMobileNav" type="button"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out">
                            More

                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div :class="{hidden: hideMobileNav}" x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <inertia-link
                                    :href="route('newsletters.edit', newsletter.slug)"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    Edit
                                </inertia-link>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-900">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="relative bg-white dark:bg-gray-900 overflow-hidden">
                    <div class="hidden lg:block lg:absolute lg:inset-0">
                        <svg class="absolute top-0 left-1/2 transform translate-x-64 -translate-y-8" width="640"
                             height="784" fill="none" viewBox="0 0 640 784">
                            <defs>
                                <pattern id="9ebea6f4-a1f5-4d96-8c4e-4c2abf658047" x="118" y="0" width="20" height="20"
                                         patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                                </pattern>
                            </defs>

                            <rect y="72" width="640" height="400" class="text-gray-50" fill="currentColor"/>
                            <rect x="118" width="404" height="500" fill="url(#9ebea6f4-a1f5-4d96-8c4e-4c2abf658047)"/>
                        </svg>
                    </div>

                    <div>
                        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                            <div class="sm:text-center lg:col-span-6 lg:text-left">
                                <h2 class="mt-1 text-4xl tracking-tight leading-10 font-extrabold text-gray-900 dark:text-gray-100 sm:leading-none sm:text-6xl lg:text-5xl xl:text-6xl">
                                    {{ newsletter.title }}
                                </h2>

                                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl"
                                   v-html="newsletter.body"/>

                                <div class="mt-5 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0">
                                    <p class="mt-3 text-sm leading-5 text-gray-500">

                                    </p>
                                </div>
                            </div>

                            <div
                                class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                                <svg
                                    class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8 scale-75 origin-top sm:scale-100 lg:hidden"
                                    width="640" height="784" fill="none" viewBox="0 0 640 784">
                                    <defs>
                                        <pattern id="4f4f415c-a0e9-44c2-9601-6ded5a34a13e" x="118" y="0" width="20"
                                                 height="20" patternUnits="userSpaceOnUse">
                                            <rect x="0" y="0" width="4" height="4" class="text-gray-200"
                                                  fill="currentColor"/>
                                        </pattern>
                                    </defs>

                                    <rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor"/>
                                    <rect x="118" width="404" height="784"
                                          fill="url(#4f4f415c-a0e9-44c2-9601-6ded5a34a13e)"/>
                                </svg>

                                <div class="relative mx-auto w-full rounded-lg shadow-lg lg:max-w-md">
                                    <img class="w-full"
                                         :src="newsletter.thumbnail_url" :alt="newsletter.title"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import LaravelCommunityButton from "@/LaravelCommunity/Form/PrimaryButton";
import LaravelCommunityPrimaryLink from "@/LaravelCommunity/Form/PrimaryLink";
import LaravelCommunitySecondaryLink from "@/LaravelCommunity/Form/SecondaryLink";

export default {
    props: ['newsletter'],

    components: {
        AppLayout,
        LaravelCommunityButton,
        LaravelCommunityPrimaryLink,
        LaravelCommunitySecondaryLink
    },

    data() {
        return {
            hideMobileNav: true
        }
    },

    methods: {
        publish() {
            this.$inertia.post(this.route('newsletters.publish', this.newsletter.slug), {
                onBefore: () => confirm('Are you sure you want to publish this newsletter?'),
                preserveScroll: true
            })
        },

        destroy() {
            this.$inertia.delete(this.route('newsletters.destroy', this.newsletter.slug), {
                onBefore: () => confirm('Are you sure you want to delete this newsletter?'),
                preserveScroll: true
            })
        },

        toggleMobileNav() {
            this.hideMobileNav = !this.hideMobileNav
        }
    }
}
</script>
