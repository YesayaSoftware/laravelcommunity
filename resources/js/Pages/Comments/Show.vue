<template>
    <div>
        <div v-if="! editing" class="flex p-4 space-x-3 justify-center items-center border-t-2 border-gray-100">
            <img class="h-12 w-12 rounded-full"
                 :src="user.profile_photo_url" :alt="user.name">

            <div class="flex-1 space-y-1">
                <div class="flex items-center justify-between">
                    <h5 class="text-sm font-medium leading-5">
                        {{ user.name }}
                    </h5>

                    <span class="text-sm leading-5 text-gray-500">
                        {{ comment.created_at_date }}
                    </span>
                </div>

                <p class="text-sm leading-5 text-gray-500">
                    {{ comment.body }}
                </p>


                <div v-if="$page.props.user" class="flex items-center justify-between">
                    <h5 class="text-sm font-medium leading-5">
                        &nbsp;
                    </h5>

                    <div class="flex text-sm leading-5 text-gray-500">
                        <button
                            class="inline-flex items-center px-3 py-1 border-2 border-red-500 text-sm leading-5 font-medium rounded-full text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:shadow-outline-blue focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out mr-4"
                            @click="destroy">
                            <svg class="w-4 h-4 mr-2"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            delete
                        </button>

                        <button
                            class="inline-flex items-center px-3 py-1 border-2 border-primary-800 text-sm leading-5 font-medium rounded-full text-primary-800 hover:bg-primary-800 hover:text-white focus:outline-none focus:shadow-outline-blue focus:border-primary-900 active:bg-primary-900 transition duration-150 ease-in-out"
                            @click="edit">
                            <svg class="w-4 h-4 mr-2"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>

                            edit
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div v-else>
            <edit-comment
                :comment="comment"
                @update-comment="update"/>
        </div>
    </div>
</template>

<script>
import EditComment from '@/Pages/Comments/Edit'

export default {
    props: ['comment'],

    components: {
        EditComment
    },

    data() {
        return {
            editing: false,
            user: {}
        }
    },

    created() {
        axios.get(this.route('api.users.show', this.comment.user_id))
            .catch(error => {
            console.log(error)
        }).then(({data}) => {
            this.user = data
        })
    },

    methods: {
        edit() {
            this.editing = !this.editing;
        },

        update() {
            this.editing = false
        },

        destroy() {
            this.$inertia.delete(this.route('posts.destroy.comment', this.comment.id), {
                onBefore: () => confirm('Are you sure you want to delete this comment?'),
                preserveScroll: true
            })
        }
    }
}
</script>
