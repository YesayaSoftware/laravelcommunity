<template>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    About the Community
                </h2>

                <p class="mt-4 text-lg text-gray-500">
                    This community is for Developers and built with Love by Developers in Tanzania. Laravel is a game changer to many and this is the corner for discussion.
                </p>
            </div>

            <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">
                <div v-for="goal in goals" :key="goal.title" class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>

                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900">
                            {{ goal.title }}
                        </p>
                    </dt>

                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        {{ goal.description }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</template>

<script>
    const goals = [
        {
            title: 'Laravel',
            description: 'If your here, you already know about Laravel. We going to talk more about Laravel and the ecosystem around it.',
        },
        {
            title: 'VueJS',
            description: 'VueJS has been in the DNA of Laravel, and Laravel Developers we love it. Why don’t we talk about it?',
        },
        {
            title: 'Tailwind CSS',
            description: 'The styling of an application can be tideous. Tailwind come to rescue us from this and it is working perfectly with Laravel.',
        },
        {
            title: 'Livewire',
            description: 'If the page reload bothers you during form submission, then with Livewire you can do all the magic.',
        },
        {
            title: 'Inertia',
            description: 'You can actually build single-page apps, without building an API.',
        },
        {
            title: 'Laravel Developers',
            description: 'Let’s build a database that will recognise Laravel Developers in Tanzania.',
        },
        {
            title: 'Events',
            description: 'Laravel developers will prepare different talk and show case of different products.',
        },
        {
            title: 'Blog',
            description: 'Developers will be invited to write blog posts as authors in the Laravel Community website.',
        }
    ]

    export default {
      name: 'Goals',

        setup() {
            return {
                goals,
            }
        }
    }
</script>
