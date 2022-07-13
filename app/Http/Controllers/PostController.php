<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Filters\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;

const PAGE_SIZE = 30;

class PostController extends Controller
{
    private Thumbnail $thumbnail;

    /**
     * Create a new PostController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])
            ->except(['index', 'show']);

        $this->thumbnail = new Thumbnail();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $posts = $this->getPosts($request);

        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse|Response
     */
    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('posts.index')
                ->with('error', 'You do not have permission to perform this action.!');
        }

        $categories = Category::orderBy('name')->get();

        return Inertia::render('Posts/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'posts') : null,
            'category_id' => $request->category_id,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post was successfully created!');
    }


    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return Response
     */
    public function show(Post $post): Response
    {
        $post->increment('visits');

        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return RedirectResponse|Response
     */
    public function edit(Post $post)
    {
        if (!auth()->user()->isAdmin())
            return redirect()->route('posts.index')
                ->with('error', 'You do not have permission to perform this action.!');

        $categories = Category::get();

        return Inertia::render('Posts/Edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the given post.
     *
     * @param Request $request
     * @param Post $post
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'body' => 'required',
        ]);

        if ($post->thumbnail)
            !$request->file('thumbnail') ?: $this->thumbnail->deleteThumbnail($post->thumbnail);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'posts') : $post->thumbnail,
        ]);

        return redirect()->route('posts.show', [
            'post' => $post->slug
        ])->with('success', 'Post was successfully updated!');
    }

    /**
     * Delete the given post.
     *
     * @param Post $post
     *
     * @return mixed
     * @throws AuthorizationException
     */
    public function destroy(Post $post)
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($post);

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post was successfully deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function removeThumbnail(Post $post): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($post);

        $post->update([
            'thumbnail' => null
        ]);

        return redirect()->back()
            ->with('success', 'Post thumbnail was successfully deleted!');
    }

    /**
     * @param Post $post
     */
    public function deleteThumbnail(Post $post): void
    {
        if ($post->thumbnail)
            $this->thumbnail->deleteThumbnail($post->thumbnail);
    }

    /**
     * Fetch all relevant threads.
     *
     * @param Request $request
     * @return mixed
     */
    protected function getPosts(Request $request)
    {
        $posts = Post::latest();

        $category = Category::where('slug', $request["category"])->first();

        if ($category && $category->exists)
            $posts->where('category_id', $category->id);

        return $posts->paginate(PAGE_SIZE);
    }
}
