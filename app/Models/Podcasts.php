<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcasts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'rss_feed_url',
        'image',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(CategoriesPodcast::class);
    }
}
