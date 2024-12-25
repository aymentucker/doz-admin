<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Podcasts;
use App\Services\PodcastService;

class FetchPodcastEpisodes extends Command
{
    protected $signature = 'podcasts:fetch-episodes';
    protected $description = 'Fetch new episodes for all podcasts';

    protected $podcastService;

    public function __construct(PodcastService $podcastService)
    {
        parent::__construct();
        $this->podcastService = $podcastService;
    }

    public function handle()
    {
        // Fetch all podcasts
        $podcasts = Podcasts::all();

        // Loop through each podcast and fetch episodes
        foreach ($podcasts as $podcast) {
            $this->podcastService->fetchAndSaveEpisodes($podcast);
        }

        $this->info('Fetched episodes for all podcasts.');
    }
}
