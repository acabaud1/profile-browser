<?php

namespace App\Http\Controllers;

use App\Models\Star;
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

    }

    public function update(Request $request): Response
    {

    }

    public function destroy(Request $request): Response
    {

    }
}