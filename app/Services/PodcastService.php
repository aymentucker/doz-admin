<?php

namespace App\Services;

use App\Models\Podcasts;
use App\Models\PodcastEpisodes;

class PodcastService
{
    public function fetchAndSaveEpisodes(Podcasts $podcast)
    {
        // Load the RSS feed
        $rssFeedUrl = $podcast->rss_feed_url;
        $rssFeed = @simplexml_load_file($rssFeedUrl);

        if ($rssFeed === false) {
            // Handle the error appropriately
            throw new \Exception("Failed to load RSS feed from {$rssFeedUrl}");
        }

        foreach ($rssFeed->channel->item as $item) {
            $title          = (string) $item->title;
            $description    = (string) $item->description;
            $audioUrl       = (string) $item->enclosure['url'];
            $publishedDate  = new \DateTime((string) $item->pubDate);

            // Initialize variables
            $duration   = '';
            $image_url  = '';

            // Access the itunes namespace elements using the prefix
            $itunes = $item->children('itunes', true);

            // Get itunes:duration
            if ($itunes->duration) {
                $duration = (string) $itunes->duration;
            }

            // Get itunes:image href attribute
            if ($itunes->image) {
                $imageAttributes = $itunes->image->attributes();
                if (isset($imageAttributes['href'])) {
                    $image_url = (string) $imageAttributes['href'];
                }
            }

            // Save each episode in the database
            PodcastEpisodes::updateOrCreate(
                [
                    'title'      => $title,
                    'podcast_id' => $podcast->id,
                ],
                [
                    'description'  => $description,
                    'audio_url'    => $audioUrl,
                    'published_at' => $publishedDate,
                    'duration'     => $duration,
                    'image_url'    => $image_url,
                ]
            );
        }
    }
}

