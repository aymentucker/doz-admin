<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Podcasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PodcastsController extends Controller
{
    // Display a listing of all podcasts
    public function index()
    {
        $podcasts = Podcasts::all();
        return response()->json($podcasts);
    }

    // Store a new podcast
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rss_feed_url' => 'required|url',
            'image' => 'required|string',
            'category_id' => 'required|exists:categories_podcasts,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create a new podcast record
        $podcast = Podcasts::create([
            'title' => $request->title,
            'description' => $request->description,
            'rss_feed_url' => $request->rss_feed_url,
            'image' => $request->image,
            'category_id' => $request->category_id,
        ]);

        return response()->json($podcast, 201);
    }

    // Display the specified podcast
    public function show($id)
    {
        $podcast = Podcasts::find($id);

        if (!$podcast) {
            return response()->json(['message' => 'Podcast not found'], 404);
        }

        return response()->json($podcast);
    }

    // Update an existing podcast
    public function update(Request $request, $id)
    {
        $podcast = Podcasts::find($id);

        if (!$podcast) {
            return response()->json(['message' => 'Podcast not found'], 404);
        }

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'description' => 'string',
            'rss_feed_url' => 'url',
            'image' => 'string',
            'category_id' => 'exists:categories_podcasts,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update the podcast record
        $podcast->update($request->all());

        return response()->json($podcast);
    }

    // Delete a podcast
    public function destroy($id)
    {
        $podcast = Podcasts::find($id);

        if (!$podcast) {
            return response()->json(['message' => 'Podcast not found'], 404);
        }

        $podcast->delete();

        return response()->json(['message' => 'Podcast deleted successfully']);
    }
}
