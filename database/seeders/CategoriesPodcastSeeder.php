<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriesPodcast;

class CategoriesPodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'ريادة الأعمال',
                'image' => 'https://images.pexels.com/photos/1054713/pexels-photo-1054713.jpeg',
                'description' => 'اكتشف أسرار النجاح في ريادة الأعمال',
            ],
            [
                'name' => 'التسويق الرقمي',
                'image' => 'https://images.pexels.com/photos/19537510/pexels-photo-19537510/free-photo-of-home-studio-for-podcasts-large-black-microphone-notebook-and-notebooks-on-table-close-up-cinematic-style.jpeg',
                'description' => 'تعلم كيفية التسويق الرقمي وزيادة المبيعات',
            ],
            [
                'name' => 'التطوير الذاتي',
                'image' => 'https://images.pexels.com/photos/8045692/pexels-photo-8045692.jpeg',
                'description' => 'تحسين الذات والمهارات الشخصية لتحقيق النجاح',
            ],
            [
                'name' => 'صناعة المحتوى',
                'image' => 'https://images.pexels.com/photos/14373043/pexels-photo-14373043.jpeg',
                'description' => 'إتقان فنون إنشاء محتوى جذاب وفعال',
            ],
            [
                'name' => 'الحوارات',
                'image' => 'https://images.pexels.com/photos/6686442/pexels-photo-6686442.jpeg',
                'description' => 'حوارات مع أبرز الشخصيات المؤثرة',
            ],
            [
                'name' => 'البث المباشر',
                'image' => 'https://images.pexels.com/photos/16587508/pexels-photo-16587508/free-photo-of-youtube-music-stream-songs-and-music-videos-app-on-the-display-of-smartphone-or-tablet.jpeg',
                'description' => 'تعلم كيفية إدارة البث المباشر بطريقة محترفة',
            ],
        ];

        foreach ($categories as $category) {
            CategoriesPodcast::create($category);
        }
    }
}
