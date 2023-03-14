<?php

namespace App\Http\Controllers;

use App\Models\Star;
use App\Http\Requests\StarUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Faker\Factory as Faker;

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
        if($request->image) {
            $imagePath = $request->image->store('stars', 'public');
        } else {
            $faker = Faker::create();
            $fakeImage = fake()->image(null, 350, 350, null, true);
            $imagePath = Storage::disk('public')->putFile('stars', $fakeImage);
        }

        Star::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'image' => $imagePath,
            'description' => $request->description
        ]);

        return redirect()->route('stars.show');
    }

    public function update(StarUpdateRequest $request, Star $star): RedirectResponse
    {
        $currentStarImage = $star->image;

        $star->fill($request->validated());

        if($request->has('image') && $request->image) {
            Storage::disk('public')->delete($star->image);
            $star->image = $request->image->store('stars', 'public');
        } else {
            $star->image = $currentStarImage;
        }

        $star->save();

        return redirect()->route('stars.show');
    }

    public function destroy(Star $star): RedirectResponse
    {
        Storage::disk('public')->delete($star->image);
        $star->delete();
        
        return redirect()->route('stars.show');
    }
}