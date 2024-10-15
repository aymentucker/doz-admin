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
                'image' => 'https://via.placeholder.com/150',
                'description' => 'اكتشف أسرار النجاح في ريادة الأعمال',
            ],
            [
                'name' => 'التسويق الرقمي',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'تعلم كيفية التسويق الرقمي وزيادة المبيعات',
            ],
            [
                'name' => 'التطوير الذاتي',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'تحسين الذات والمهارات الشخصية لتحقيق النجاح',
            ],
            [
                'name' => 'صناعة المحتوى',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'إتقان فنون إنشاء محتوى جذاب وفعال',
            ],
            [
                'name' => 'الحوارات',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'حوارات مع أبرز الشخصيات المؤثرة',
            ],
            [
                'name' => 'البث المباشر',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'تعلم كيفية إدارة البث المباشر بطريقة محترفة',
            ],
        ];

        foreach ($categories as $category) {
            CategoriesPodcast::create($category);
        }
    }
}
