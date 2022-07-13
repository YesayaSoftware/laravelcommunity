<template>
    <app-layout>
        <template #header>
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-xl dark:text-gray-300 text-gray-800 leading-tight">
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
                    <span class="hidden sm:block shadow-sm rounded-md">
                        <yesaya-software-secondary-link
                            :href="route('newsletters.show', newsletter.slug)"
                            class="dark:bg-gray-800 dark:hover:bg-gray-900">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-100" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>

                            View
                        </yesaya-software-secondary-link>
                    </span>

                    <span v-if="$page.props.user" class="sm:ml-3 shadow-sm rounded-md">
                        <form id="subscribe-form" action="" method="POST">
                            <yesaya-software-button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>

                                Subscribe
                            </yesaya-software-button>
                        </form>
                    </span>
                </div>
            </div>
        </template>

        <div class="mt-4 bg-white dark:bg-gray-800">
            <div class="mx-auto py-12 px-4 max-w-screen-xl sm:px-6 lg:px-8 lg:py-16">
                <div class="space-y-12">
                    <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                        <form class="space-y-8 divide-y divide-gray-200"
                              method="POST"
                              @submit.prevent="update">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-300">
                                            Update Newsletter
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

                                            <p v-if="errors" class="mt-2 text-sm text-red-600" id="email-error">
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

                                            <p v-if="errors" class="mt-2 text-sm" id="description-error">
                                                <span v-if="errors.body"
                                                      class="text-red-600">{{ errors.body }}.</span>

                                                <span v-else class="text-gray-500">Write a few sentences to describe this newsletter.</span>
                                            </p>
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="cover_photo" class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>

                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="w-full space-y-1 text-center">
                                                    <!-- Current Newsletter Thumbnail -->
                                                    <div class="w-full" v-show="! thumbnailPreview">
                                                        <img :src="newsletter.thumbnail_url" alt="Current Thumbnail"
                                                             class="w-full object-cover">
                                                    </div>

                                                    <!-- New Newsletter Thumbnail Preview -->
                                                    <div class="w-full" v-show="thumbnailPreview">
                                                        <span class="block w-full h-72"
                                                              :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + thumbnailPreview + '\');'">
                                                        </span>
                                                    </div>

                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="thumbnail"
                                                               class="relative cursor-pointer bg-white dark:bg-transparent rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                            <span>Upload a file</span>

                                                            <input @change="updateThumbnailPreview"
                                                                   id="thumbnail"
                                                                   ref="thumbnail"
                                                                   name="thumbnail"
                                                                   type="file"
                                                                   accept="image/*"
                                                                   class="sr-only"/>
                                                        </label>

                                                        <button class="pl-1" @click.prevent="selectNewThumbnail">
                                                            | Preview |
                                                        </button>

                                                        <button
                                                            class="pl-1 cursor-pointer bg-white dark:bg-transparent rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500"
                                                            @click.prevent="selectNewThumbnail">
                                                            Remove
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
import LaravelCommunityLabel from "@/LaravelCommunity/Form/Label";
import LaravelCommunityInput from "@/LaravelCommunity/Form/Input";
import LaravelCommunityTextarea from "@/LaravelCommunity/Form/Textarea";
import LaravelCommunityButton from "@/LaravelCommunity/Form/PrimaryButton";
import LaravelCommunityPrimaryLink from "@/LaravelCommunity/Form/PrimaryLink";
import LaravelCommunitySecondaryLink from "@/LaravelCommunity/Form/SecondaryLink";

export default {
    props: ['newsletter', 'errors'],

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
            form: this.$inertia.form({
                '_method': 'PUT',
                title: this.newsletter.title,
                body: this.newsletter.body,
                thumbnail: this.newsletter.thumbnail
            }, {
                bag: 'store',
                resetOnSuccess: false,
            }),

            thumbnailPreview: null,
        }
    },

    methods: {
        update() {
            if (this.$refs.thumbnail)
                this.form.thumbnail = this.$refs.thumbnail.files[0]

            this.form.post(route('newsletters.update', this.newsletter.slug), {
                preserveScroll: true
            })
        },

        selectNewThumbnail() {
            this.$refs.thumbnail.click();
        },

        updateThumbnailPreview() {
            const reader = new FileReader()

            reader.onload = (e) => {
                this.thumbnailPreview = e.target.result
            };

            reader.readAsDataURL(this.$refs.thumbnail.files[0])
        },

        deleteThumbnail() {
            this.$inertia.delete(route('newsletters.delete.thumbnail', this.newsletter.slug), {
                preserveScroll: true,

                onFinish: () => this.thumbnailPreview = null
            })
        },
    }
}
</script>
