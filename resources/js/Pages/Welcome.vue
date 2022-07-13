<template xmlns="http://www.w3.org/1999/html">
    <Head title="Welcome"/>

    <div class="relative bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-0" aria-hidden="true">
            <svg class="absolute mt-0 top-0 left-1/2 transform translate-x-64 -translate-y-8" width="640" height="784"
                 fill="none" viewBox="0 0 640 784">
                <defs>
                    <pattern id="9ebea6f4-a1f5-4d96-8c4e-4c2abf658047" x="118" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor"/>
                <rect x="118" width="404" height="784" fill="url(#9ebea6f4-a1f5-4d96-8c4e-4c2abf658047)"/>
            </svg>
        </div>

        <div class="relative pt-6 pb-16 sm:pb-24 lg:pb-32">
            <div>
                <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6"
                     aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="#">
                                <span class="sr-only">Laravel Community Tanzania</span>

                                <img class="h-12 w-auto sm:h-10"
                                     src="/img/logo.png"
                                     alt="Laravel Community Tanzania">
                            </a>

                            <div
                                @click="toggleMobileNav"
                                class="-mr-2 flex items-center md:hidden">
                                <button
                                    type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-800"
                                    aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>

                                    <!-- Heroicon name: outline/menu -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="hidden md:block md:ml-10 md:space-x-10">
                            <a
                                href="#"
                                class="font-medium text-gray-500 hover:text-gray-900">
                                Home
                            </a>

                            <a
                                href="/posts"
                                class="font-medium text-gray-500 hover:text-gray-900">
                                Blog
                            </a>

                            <a
                                href="#"
                                class="font-medium text-gray-500 hover:text-gray-900">
                                Events
                            </a>

                            <a
                                href="#"
                                class="font-medium text-gray-500 hover:text-gray-900">
                                Developers
                            </a>
                        </div>
                    </div>

                    <div v-if="! $page.props.user" class="hidden md:block text-right">
                        <span class="inline-flex rounded-md shadow-md ring-1 ring-black ring-opacity-5">
                            <a :href="route('login')"
                               class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-primary-900 bg-white hover:bg-gray-50">
                                Log in
                            </a>
                        </span>
                    </div>
                </nav>

                <div :class="{hidden: hideMobileNav}"
                     class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <img class="h-12 w-auto"
                                     src="/img/logo.png"
                                     alt="Laravel Community Tanzania">
                            </div>

                            <div @click="toggleMobileNav"
                                 class="-mr-2">
                                <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-800">
                                    <span class="sr-only">Close main menu</span>

                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Home
                            </a>

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Blog
                            </a>

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Events
                            </a>

                            <a href="#"
                               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Developers
                            </a>
                        </div>

                        <a v-if="! $page.props.user" href="#"
                           class="block w-full px-5 py-3 text-center font-medium text-primary-900 bg-gray-50 hover:bg-gray-100">
                            Log in
                        </a>
                    </div>
                </div>
            </div>

            <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6 lg:mt-32">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                        <h1>
                            <span class="block text-sm font-semibold uppercase tracking-wide text-gray-500 sm:text-base lg:text-sm xl:text-base">Tanzania</span>

                            <span class="mt-1 block text-4xl tracking-tight font-extrabold sm:text-5xl xl:text-6xl">
                                <span class="block text-gray-900">A Community for</span>
                                <span class="block text-primary-900">Laravel Developers</span>
                            </span>
                        </h1>

                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                            A like minded community that brings together Laravel Developers in Tanzania to discuss issues and exchange ideas.
                        </p>

                        <div class="mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0">

                            <Link :href="route('register')" class="mt-3 w-full px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-800 shadow-sm hover:bg-primary-900 active:bg-primary-300 active:text-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800 sm:mt-0 sm:ml-3 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto">
                                Join our community today
                            </Link>
                        </div>
                    </div>

                    <div
                        class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                        <svg
                            class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8 scale-75 origin-top sm:scale-100 lg:hidden"
                            width="640" height="784" fill="none" viewBox="0 0 640 784" aria-hidden="true">
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
                            <button type="button"
                                    class="relative block w-full bg-white rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800">
                                <span class="sr-only">Watch our video to learn more</span>

                                <img class="w-full"
                                     src="/img/banner.jpg"
                                     alt="Laravel Developers">

                                <div class="absolute inset-0 w-full h-full flex items-center justify-center"
                                     aria-hidden="true">
                                    <svg class="h-20 w-20 text-primary-900" fill="currentColor" viewBox="0 0 84 84">
                                        <circle opacity="0.9" cx="42" cy="42" r="42" fill="white"/>
                                        <path
                                            d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z"/>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <Goals/>

    <Subscribe/>

    <Footer/>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Subscribe from "./../LaravelCommunity/Subscribe.vue";
import Footer from "./../LaravelCommunity/Footer.vue";
import Goals from "./../LaravelCommunity/Goals.vue";

export default defineComponent({
    data() {
        return {
            hideMobileNav: true
        }
    },

    components: {
        Goals,
        Head,
        Link,
        Subscribe,
        Footer,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },

    methods: {
        toggleMobileNav() {
            this.hideMobileNav = !this.hideMobileNav
        }
    }
})
</script>
