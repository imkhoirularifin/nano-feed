<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('feeds.index', [
            'feeds' => Feed::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->feeds()->create($validated);

        return redirect(route('feeds.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed): View
    {
        $this->authorize('update', $feed);

        return view('feeds.edit', [
            'feed' => $feed,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feed $feed): RedirectResponse
    {
        $this->authorize('update', $feed);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $feed->update($validated);

        return redirect(route('feeds.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed): RedirectResponse
    {
        $this->authorize('delete', $feed);

        $feed->delete();

        return redirect(route('feeds.index'));
    }
}
