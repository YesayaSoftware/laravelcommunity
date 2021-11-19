<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the post.
     *
     * @param User $user
     * @param Post $post
     *
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $post->user_id == $user->id;
    }
}
