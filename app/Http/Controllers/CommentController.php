<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Persist a new comment.
     *
     * @param Post $post
     *
     * @return RedirectResponse
     */
    public function store(Post $post): RedirectResponse
    {
        $post->addComment([
            'body' => request('body'),
            'user_id' => auth()->id()
        ])->load('user');

        return redirect()->back()
            ->with('success', 'Comment added successfully.!');
    }

    /**
     * Update an existing reply.
     *
     * @param Comment $comment
     * @throws AuthorizationException
     */
    public function update(Comment $comment): RedirectResponse
    {
        $this->authorize('update', $comment);

        $comment->update(
            request()->validate(['body' => 'required'])
        );

        return redirect()->back()
            ->with('success', 'Comment updated successfully.!');
    }

    /**
     * Delete the given comment.
     *
     * @param  Comment $comment
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $this->authorize('update', $comment);

        $comment->delete();

        return redirect()->back()
            ->with('success', 'Comment delete successfully.!');
    }
}
