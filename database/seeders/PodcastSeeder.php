<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podcasts')->insert([
            [
                'title' => 'Business Growth Podcast',
                'description' => 'Discussing strategies for growing your business.',
                'rss_feed_url' => 'https://anchor.fm/s/ec5e9754/podcast/rss',
                'image' => 'https://via.placeholder.com/150',
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Digital Marketing Mastery',
                'description' => 'Learn about the latest digital marketing trends and tactics.',
                'rss_feed_url' => 'https://anchor.fm/s/ec5e9754/podcast/rss',
                'image' => 'https://via.placeholder.com/150',
                'category_id' => 2,
                'user_id' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Personal Development Insights',
                'description' => 'Improve your personal skills and mindset for success.',
                'rss_feed_url' => 'https://anchor.fm/s/ec5e9754/podcast/rss',
                'image' => 'https://via.placeholder.com/150',
                'category_id' => 3,
                'user_id' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
