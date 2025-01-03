<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesPodcast extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
    ];
    public function podcasts()
    {
        return $this->hasMany(Podcasts::class, 'category_id');
    }
}
