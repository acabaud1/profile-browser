<?php

namespace App\Http\Controllers;

use App\Models\Star;
use App\Http\Requests\StarUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StarController extends Controller
{
    public function show(Request $request): Response
    {
        return Inertia::render('Stars', [
            'stars' => Star::all()
        ]);
    }

    public function edit(Star $star): Response
    {
        return Inertia::render('Star/Edit', [
            'star' => $star
        ]);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Star/Edit', [
            'star' => null
        ]);
    }

    public function store(StarUpdateRequest $request): RedirectResponse
    {
        Star::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'image' => $request->image,
            'description' => $request->description
        ]);

        return redirect()->route('stars.show');
    }

    public function update(StarUpdateRequest $request): RedirectResponse
    {

    }

    public function destroy(Star $star): RedirectResponse
    {
        $star->delete();
        
        return redirect()->route('stars.show');
    }
}