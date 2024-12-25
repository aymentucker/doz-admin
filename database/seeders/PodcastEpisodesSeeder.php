<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PodcastEpisodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podcast_episodes')->insert([
            [
                'podcast_id' => 1, // Reference to an existing podcast ID
                'title' => 'Introduction to Podcasting',
                'description' => 'This episode introduces the concept of podcasting and its benefits.',
                'audio_url' => 'https://example.com/audio/episode1.mp3',
                'image_url'=> 'https://images.pexels.com/photos/1054713/pexels-photo-1054713.jpeg',
                'duration'=>'00:13:02',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'podcast_id' => 1, // Reference to an existing podcast ID
                'title' => 'Episode 2: Deep Dive into Podcasting',
                'description' => 'A detailed discussion on how to get started with podcasting.',
                'audio_url' => 'https://example.com/audio/episode2.mp3',
                'image_url'=> 'https://images.pexels.com/photos/1054713/pexels-photo-1054713.jpeg',
                'duration'=>'00:13:02',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'podcast_id' => 2, // Reference to another existing podcast ID
                'title' => 'The Future of Podcasting',
                'description' => 'Exploring where podcasting is headed in the next few years.',
                'audio_url' => 'https://example.com/audio/episode3.mp3',
                'image_url'=> 'https://images.pexels.com/photos/1054713/pexels-photo-1054713.jpeg',
                'duration'=>'00:13:02',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
