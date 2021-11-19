<template>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:py-16 lg:px-8">
            <div class="px-6 py-6 bg-primary-900 rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
                <div class="xl:w-0 xl:flex-1">
                    <h2 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                        Want community news and updates?
                    </h2>

                    <p class="mt-3 max-w-3xl text-lg leading-6 text-primary-300">
                        Sign up for our newsletter to stay up to date.
                    </p>
                </div>

                <div @submit.prevent="store" class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                    <form class="sm:flex">
                        <label for="email-address" class="sr-only">
                            Email address
                        </label>

                        <input id="email-address" name="email-address" type="email" v-model="form.email" autocomplete="email" required class="w-full border-white px-5 py-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-800 focus:ring-white rounded-md" placeholder="Enter your email">

                        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit" class="mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent shadow text-base font-medium rounded-md text-primary-900 bg-primary-100 hover:bg-primary-300 hover:text-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-800 focus:ring-white sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0">
                            Notify me
                        </button>
                    </form>


                    <p class="mt-3 text-sm text-primary-300">
                        We care about the protection of your data. Read our
                        <a href="/privacy" class="text-white font-medium underline">
                            Privacy Policy.
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {CheckCircleIcon} from "@heroicons/vue/solid/esm";

export default {
    name: 'Subscribe',

    data() {
        return {
            form: this.$inertia.form({
                email: '',
            })
        }
    },

    components: {
        CheckCircleIcon,
    },

    props: ['sessions'],

    methods: {
        store() {
            this.form.post(this.route('subscribe.store'), {
                preserveScroll: true,
                onSuccess: () => this.form.reset()
            })
        }
    }
}
</script>
