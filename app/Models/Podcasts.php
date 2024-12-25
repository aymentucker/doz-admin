<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcasts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'rss_feed_url',
        'image',
        'category_id',
        'user_id',
    ];
    public function category()
    {
        return $this->belongsTo(CategoriesPodcast::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function episodes()
    // {
    //     return $this->hasMany(PodcastEpisodes::class);
    // }
    public function episodes()
{
    return $this->hasMany(PodcastEpisodes::class, 'podcast_id');  // Ensure foreign key is 'podcast_id'
}

}
