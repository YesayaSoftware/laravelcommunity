<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscribeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        Subscribe::firstOrCreate([
            'email' => $request->email,
        ]);

        return back()
            ->with('success', 'Thanks, you will be updated.');
    }
}
