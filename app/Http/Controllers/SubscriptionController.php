<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Store a new category subscription.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function store(Category $category): RedirectResponse
    {
        $category->subscribe();

        return redirect()->back()
            ->with('success', 'You subscribed to the category!');
    }

    /**
     * Delete an existing category subscription.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->unsubscribe();

        return redirect()->back()
            ->with('success', 'You unsubscribed to the category!');
    }
}
