<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Filters\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;

class CategoryController extends Controller
{
    private Thumbnail $thumbnail;

    /**
     * Create a new CategoryController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])->except(['index', 'show']);

        $this->thumbnail = new Thumbnail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $categories = Category::get();

        return Inertia::render('Categories/Index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse|\Inertia\Response
     */
    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('categories.index')
                ->with('error', 'You do not have permission to perform this action.!');
        }

        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'categories') : null,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category was successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Inertia\Response
     */
    public function show(Category $category): \Inertia\Response
    {
        $category = $category->load('posts');

        return Inertia::render('Categories/Show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return RedirectResponse|\Inertia\Response
     */
    public function edit(Category $category)
    {
        if (!auth()->user()->isAdmin())
            return redirect()->route('categories.index')
                ->with('error', 'You do not have permission to perform this action.!');

        return Inertia::render('Categories/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse|Response
     * @throws AuthorizationException
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'required',
        ]);

        if ($category->thumbnail)
            !$request->file('thumbnail') ?: $this->thumbnail->deleteThumbnail($category->thumbnail);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'categories') : $category->thumbnail,
        ]);

        return redirect()->route('categories.show', $category->slug)
            ->with('success', 'Category was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($category);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category was successfully deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function removeThumbnail(Category $category): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($category);

        $category->update([
            'thumbnail' => null
        ]);

        return redirect()->back()
            ->with('success', 'Category thumbnail was successfully deleted!');
    }

    /**
     * @param Category $category
     */
    public function deleteThumbnail(Category $category): void
    {
        if ($category->thumbnail)
            $this->thumbnail->deleteThumbnail($category->thumbnail);
    }
}
