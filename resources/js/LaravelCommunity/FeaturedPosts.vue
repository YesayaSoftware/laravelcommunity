<template>
    <div
        class="max-w-screen-xl mx-auto relative bg-gray-50 dark:bg-gray-900 pt-8 pb-20 px-4 sm:px-6 lg:pt-16 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white dark:bg-gray-900 h-1/3 sm:h-2/3"></div>
        </div>

        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 dark:text-white sm:text-4xl sm:leading-10">
                    Machapisho
                </h2>

                <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                    Mara kwa mara ninaweka machapisho mbalimbali kama Articles, Podcast au Video Tutorials. Angalia hapa
                    chini na
                    ninakusihi ushirikishe wengine.
                </p>
            </div>

            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                <div v-for="post in posts" :key="post.id"
                     class="flex flex-col rounded-lg dark:bg-gray-800 shadow-lg overflow-hidden">
                    <inertia-link
                        :href="route('posts.show', post.slug)">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                 :src="post.thumbnail_url" :alt="posts.title">
                        </div>

                        <div class="flex-1 bg-white dark:bg-gray-800 p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm leading-5 font-medium text-blue-600">
                                    <a :href="route('categories.show', post.category.slug)" class="hover:underline">
                                        {{ post.category.name }}
                                    </a>
                                </p>

                                <a href="#" class="block">
                                    <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900 dark:text-white">
                                        {{ post.title.substring(0, 50).concat('...') }}
                                    </h3>

                                    <p class="mt-3 text-base leading-6 text-gray-500"
                                       v-html="$options.filters.summary(post.body)"/>
                                </a>
                            </div>

                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <img class="h-10 w-10 rounded-full"
                                             :src="post.user.profile_photo_url"
                                             :alt="post.user.name">
                                    </a>
                                </div>

                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-medium text-gray-900 dark:text-gray-100">
                                        <a href="#" class="hover:underline">
                                            {{ post.user.name }}
                                        </a>
                                    </p>

                                    <div class="flex text-sm leading-5 text-gray-500">
                                        <time>
                                            {{ post.created_at_date }}
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FeaturedPosts',
    props: {
        posts: {}
    },

    filters: {
        summary: function (body) {
            return body.substring(0, 140) + '...';
        }
    },
}
</script>
