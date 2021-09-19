<template>
    <Head title="Welcome" />

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
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>

                                <!-- Heroicon name: outline/menu -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
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
                            href="#"
                            class="font-medium text-gray-500 hover:text-gray-900">
                            Developers
                        </a>

                        <a
                            href="#"
                            class="font-medium text-gray-500 hover:text-gray-900">
                            Events
                        </a>

                        <a
                            href="#"
                            class="font-medium text-gray-500 hover:text-gray-900">
                            Blog
                        </a>
                    </div>
                </div>

                <div class="hidden md:block text-right">
            <span class="inline-flex rounded-md shadow-md ring-1 ring-black ring-opacity-5">
              <a
                  href="#"
                  class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-primary-900 bg-white hover:bg-gray-50">
                  Log in
              </a>
            </span>
                </div>
            </nav>

            <div
                :class="{hidden: hideMobileNav}"
                class="bg-white overflow-hidden">
                <div
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                    <div
                        class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div
                            class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <img
                                    class="h-12 w-auto"
                                    src="/img/logo.png"
                                    alt="Laravel Community Tanzania">
                            </div>

                            <div
                                @click="toggleMobileNav"
                                class="-mr-2">
                                <button
                                    type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close main menu</span>

                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a
                                href="#"
                                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Home
                            </a>

                            <a
                                href="#"
                                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Developers
                            </a>

                            <a
                                href="#"
                                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Events
                            </a>

                            <a
                                href="#"
                                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Blog
                            </a>
                        </div>

                        <a
                            href="#"
                            class="block w-full px-5 py-3 text-center font-medium text-primary-900 bg-gray-50 hover:bg-gray-100">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        data() {
          return {
              hideMobileNav: true
          }
        },

        components: {
            Head,
            Link,
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
