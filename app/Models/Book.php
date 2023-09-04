<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Genre;
use App\Models\PublishingHouse;
class Book extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function publishingHouse()
    {
        return $this->belongsTo(PublishingHouse::class);
    }
}
