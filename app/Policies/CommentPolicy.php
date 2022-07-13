<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the authenticated user has permission to update a comment.
     *
     * @param  User $user
     * @param Comment $comment
     *
     * @return bool
     */
    public function update(User $user, Comment $comment)
    {
        return $comment->user_id == $user->id;
    }

    /**
     * Determine if the authenticated user has permission to create a new comment.
     *
     * @param  User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        if (! $lastComment = $user->fresh()->lastComment) {
            return true;
        }

        return ! $lastComment->wasJustPublished();
    }
}
