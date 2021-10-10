<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class FavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Store a new favorite in the database.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function store(Post $post): RedirectResponse
    {
        $post->favorite();

        return redirect()->back()
            ->with('success', 'You liked the post.!');
    }

    /**
     * Delete the favorite.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->unfavorite();

        return redirect()->back()
            ->with('success', 'You unliked the post.!');
    }
}
