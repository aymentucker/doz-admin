<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Podcasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PodcastService;
use App\Models\PodcastEpisodes;


class PodcastsController extends Controller
{
    protected $podcastService;

    public function __construct(PodcastService $podcastService)
    {
        $this->podcastService = $podcastService;
    }

    public function fetchEpisodes(Podcasts $podcast)
    {
        // Call the service to fetch episodes
        $this->podcastService->fetchAndSaveEpisodes($podcast);

        return response()->json(['message' => 'Episodes fetched successfully.']);
    }
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

        // Get the validated data
        $validatedData = $validator->validated();

        // Add the authenticated user's ID
        $validatedData['user_id'] = 1; // or $validatedData['user_id'] = 1;

        // Create a new podcast record
        $podcast = Podcasts::create($validatedData);

        // Fetch and save episodes for the new podcast
        $this->podcastService->fetchAndSaveEpisodes($podcast);

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

    // Fetch podcasts for a specific category
    public function getByCategory($categoryId)
    {
        // Retrieve podcasts by category and include the count of episodes for each podcast
        $podcasts = Podcasts::where('category_id', $categoryId)
            ->with(['user:id,name'])  // Load user data with only id and name
            ->withCount('episodes')   // Get the count of episodes for each podcast
            ->get();

        if ($podcasts->isEmpty()) {
            return response()->json(['message' => 'No podcasts found for this category'], 404);
        }

        return response()->json($podcasts);
    }





    // Fetch episodes for a specific podcast
    public function getEpisodes($podcastId)
    {
        $episodes = PodcastEpisodes::where('podcast_id', $podcastId)->get();

        if ($episodes->isEmpty()) {
            return response()->json(['message' => 'No episodes found for this podcast'], 404);
        }

        return response()->json($episodes);
    }
}
