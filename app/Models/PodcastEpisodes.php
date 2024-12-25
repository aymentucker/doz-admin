<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PodcastEpisodes extends Model
{
    protected $fillable = [
        'podcast_id',
        'title',
        'description',
        'audio_url',
        'published_at',
    ];

    public function podcast()
{
    return $this->belongsTo(Podcasts::class, 'podcast_id');
}

}
