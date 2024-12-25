<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcasts;
use App\Services\PodcastService;

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

    // Display a listing of podcasts
    public function index()
    {
        $podcasts = Podcasts::all();
        return view('podcasts.index', compact('podcasts'));
    }

    // Show the form for creating a new podcast
    public function create()
    {
        return view('podcasts.create');
    }

    // Store a newly created podcast in storage
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'rss_feed_url'  => 'required|url',
            'image'         => 'nullable|string',
            'category_id'   => 'required|exists:categories_podcasts,id',
        ]);

        // Create the new podcast
        $podcast = Podcasts::create($validatedData);

        // Fetch and save episodes for the new podcast
        $this->podcastService->fetchAndSaveEpisodes($podcast);

        // Redirect to the podcast details page with a success message
        return redirect()->route('podcasts.show', $podcast->id)
            ->with('success', 'Podcast created and episodes fetched successfully.');
    }

    // Display the specified podcast
    public function show(Podcasts $podcast)
    {
        return view('podcasts.show', compact('podcast'));
    }
}
