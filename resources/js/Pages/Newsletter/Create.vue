<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="dark:text-gray-300 font-semibold text-xl text-gray-800 leading-tight">
                        New Newsletter
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
                    <span class="sm:ml-3 shadow-sm rounded-md">
                        <yesaya-software-primary-link
                            :href="route('newsletters.index')">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M4 6C4 4.89543 4.89543 4 6 4H8C9.10457 4 10 4.89543 10 6V8C10 9.10457 9.10457 10 8 10H6C4.89543 10 4 9.10457 4 8V6Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M14 6C14 4.89543 14.8954 4 16 4H18C19.1046 4 20 4.89543 20 6V8C20 9.10457 19.1046 10 18 10H16C14.8954 10 14 9.10457 14 8V6Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M4 16C4 14.8954 4.89543 14 6 14H8C9.10457 14 10 14.8954 10 16V18C10 19.1046 9.10457 20 8 20H6C4.89543 20 4 19.1046 4 18V16Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M14 16C14 14.8954 14.8954 14 16 14H18C19.1046 14 20 14.8954 20 16V18C20 19.1046 19.1046 20 18 20H16C14.8954 20 14 19.1046 14 18V16Z"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            List
                        </yesaya-software-primary-link>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-800">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <h2 class="text-3xl dark:text-gray-300 leading-9 font-extrabold tracking-tight sm:text-4xl">
                            Malengo Yangu
                        </h2>

                        <p class="text-xl leading-7 text-gray-500">
                            Nimejifunza kuwa njia nzuri ya kuelewa zaidi ni kufundisha wengine ulichojifunza. Napenda
                            nachofanya na nataka kuelewa zaidi. Hapa chini, ni maeneo muhimu ninayofanya nayo kazi na
                            ninapenda kukushirikisha wewe.
                        </p>
                    </div>

                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="store">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="dark:text-gray-300 text-lg leading-6 font-medium text-gray-900">
                                            New Newsletter
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-500">
                                            This information will be displayed publicly so be careful what you share.
                                        </p>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <yesaya-software-label
                                                for="title"
                                                :class="errors.title ? 'text-red-900' : 'text-gray-700'"
                                                value="Title" />

                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <yesaya-software-input id="title" type="text"
                                                                       v-model="form.title" autofocus
                                                                       :class="errors.title ? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''"/>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="title-error">
                                                <span v-if="errors.title">{{ errors.title }}.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <yesaya-software-label
                                                for="body"
                                                :class="errors.body ? 'text-red-900' : 'text-gray-700'"
                                                value="Body" />

                                            <div class="mt-1">
                                                <LaravelCommunityTextarea  v-model="form.body"
                                                                         id="body"
                                                                         name="body"
                                                                         :class="errors.body ? 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': ''"/>
                                            </div>

                                            <p v-if="errors" class="mt-2 text-sm" id="body-error">
                                                    <span v-if="errors.body"
                                                          class="text-red-600">{{ errors.body }}.</span>

                                                <span v-else class="text-gray-500">Write a few sentences to describe this newsletter.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="cover_photo"
                                                   class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>

                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="w-full space-y-1 text-center">
                                                    <svg v-show="! thumbnailPreview"
                                                         class="mx-auto h-12 w-12 text-gray-400"
                                                         stroke="currentColor"
                                                         fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                    </svg>

                                                    <!-- New Newsletter Thumbnail Preview -->
                                                    <div class="w-full" v-show="thumbnailPreview">
                                                        <span class="block w-full h-72"
                                                              :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + thumbnailPreview + '\');'">
                                                        </span>
                                                    </div>

                                                    <div class="flex text-sm text-gray-600">

                                                        <label for="thumbnail"
                                                               class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                            <span>Upload a file</span>

                                                            <input @change="updateThumbnailPreview"
                                                                   id="thumbnail"
                                                                   name="thumbnail"
                                                                   ref="thumbnail"
                                                                   type="file"
                                                                   accept="image/*"
                                                                   class="sr-only"/>
                                                        </label>

                                                        <button class="pl-1" @click.prevent="selectNewThumbnail">
                                                            | Preview
                                                        </button>
                                                    </div>

                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 10MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <yesaya-software-secondary-link :href="route('newsletters.index')">
                                            Cancel
                                        </yesaya-software-secondary-link>

                                        <yesaya-software-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Save
                                        </yesaya-software-button>
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
import AppLayout from '@/Layouts/AppLayout'
import LaravelCommunityLabel from '@/LaravelCommunity/Form/Label'
import LaravelCommunityInput from '@/LaravelCommunity/Form/Input'
import LaravelCommunityTextarea from '@/LaravelCommunity/Form/Textarea'
import LaravelCommunityButton from '@/LaravelCommunity/Form/PrimaryButton'
import LaravelCommunityPrimaryLink from '@/LaravelCommunity/Form/PrimaryLink'
import LaravelCommunitySecondaryLink from '@/LaravelCommunity/Form/SecondaryLink'

export default {
    props: ['errors'],

    components: {
        AppLayout,
        LaravelCommunityLabel,
        LaravelCommunityInput,
        LaravelCommunityTextarea,
        LaravelCommunityButton,
        LaravelCommunityPrimaryLink,
        LaravelCommunitySecondaryLink
    },

    data() {
        return {
            form: {
                title: '',
                body: '',
                thumbnail: ''
            },

            thumbnailPreview: null
        }
    },

    methods: {
        store() {
            if (this.$refs.thumbnail)
                this.form.thumbnail = this.$refs.thumbnail.files[0]

            let newsletter = new FormData()

            newsletter.append('title', this.form.title)
            newsletter.append('body', this.form.body)
            newsletter.append('thumbnail', this.form.thumbnail)

            this.$inertia.post(route('newsletters.store'), newsletter, {
                preserveScroll: true
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
    }
}
</script>
