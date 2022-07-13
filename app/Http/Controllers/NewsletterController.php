<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Subscribe;
use App\Models\Newsletter;
use App\Filters\Thumbnail;
use App\Mail\SendNewsletter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;

class NewsletterController extends Controller
{
    private Thumbnail $thumbnail;

    /**
     * Create a new NewsletterController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);

        $this->thumbnail = new Thumbnail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|\Inertia\Response
     */
    public function index()
    {
        if (!auth()->user()->isAdmin())
            return redirect()->route('posts.index')
                ->with('error', 'You do not have permission to perform this action.!');

        $newsletters = Newsletter::get();

        return Inertia::render('Newsletter/Index', [
            'newsletters' => $newsletters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse|\Inertia\Response
     */
    public function create()
    {
        if (!auth()->user()->isAdmin())
            return redirect()->route('posts.index')
                ->with('error', 'You do not have permission to perform this action.!');


        return Inertia::render('Newsletter/Create');
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

        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Newsletter::create([
            'title' => request('title'),
            'body' => request('body'),
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'newsletters') : null,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter was successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param Newsletter $newsletter
     * @return RedirectResponse|\Inertia\Response
     */
    public function show(Newsletter $newsletter)
    {
        if (!auth()->user()->isAdmin())
            return redirect()->route('newsletters.index')
                ->with('error', 'You do not have permission to perform this action.!');

        return Inertia::render('Newsletter/Show', [
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Newsletter $newsletter
     * @return RedirectResponse|\Inertia\Response
     */
    public function edit(Newsletter $newsletter)
    {
        if (!auth()->user()->isAdmin())
            return redirect()->route('newsletters.index')
                ->with('error', 'You do not have permission to perform this action.!');

        return Inertia::render('Newsletter/Edit', [
            'newsletter' => $newsletter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Newsletter $newsletter
     * @return RedirectResponse|Response
     * @throws AuthorizationException
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $this->authorize('admin', auth()->user());

        $request->validate([
            'title' => 'required|unique:newsletters,name,' . $newsletter->id,
            'body' => 'required',
        ]);

        if ($newsletter->thumbnail)
            !$request->file('thumbnail') ?: $this->thumbnail->deleteThumbnail($newsletter->thumbnail);

        $newsletter->update([
            'title' => $request->title,
            'body' => $request->body,
            'thumbnail' => $request->file('thumbnail') ? $this->thumbnail->storeThumbnail($request, 'newsletters') : $newsletter->thumbnail,
        ]);

        return redirect()->route('newsletters.show', $newsletter->slug)
            ->with('success', 'Newsletter was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Newsletter $newsletter
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Newsletter $newsletter): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($newsletter);

        $newsletter->delete();

        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter was successfully deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Newsletter $newsletter
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function removeThumbnail(Newsletter $newsletter): RedirectResponse
    {
        $this->authorize('admin', auth()->user());

        $this->deleteThumbnail($newsletter);

        $newsletter->update([
            'thumbnail' => null
        ]);

        return redirect()->back()
            ->with('success', 'Newsletter thumbnail was successfully deleted!');
    }

    /**
     * @param Newsletter $newsletter
     */
    public function deleteThumbnail(Newsletter $newsletter): void
    {
        if ($newsletter->thumbnail)
            $this->thumbnail->deleteThumbnail($newsletter->thumbnail);
    }

    /**
     * @param Newsletter $newsletter
     * @return RedirectResponse
     */
    public function publish(Newsletter $newsletter): RedirectResponse
    {
        $subscribers = Subscribe::where('active', true)->get('email');

        foreach ($subscribers as $recipient) {
            Mail::to($recipient)->send(new SendNewsletter($newsletter));
        }

        $newsletter->update([
            'status' => true
        ]);

        return redirect()->back()
            ->with('success', 'Newsletter sent!');
    }
}
